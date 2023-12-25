<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Attachment;

class OrderRequestFreelancerMail extends Mailable
{
    use Queueable, SerializesModels;
    public $order;
    public $customer;
    public $zipStoragePath;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order, $customer, $zipStoragePath)
    {
        $this->order = $order;
        $this->customer = $customer;
        $this->zipStoragePath = $zipStoragePath;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        $subject = $this->order->type == 'Embroidery' ? 'New Change Embroidery Program | ' : 'New Change Vector Program | ';
        $subject .= $this->order->order_number;

        return new Envelope(
            from: env('MAIL_FROM_ADDRESS'),
            subject: $subject,
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            html: 'email.order-request-freelancer',
            with: [
                'order' => $this->order,
                'customer' => $this->customer,
                'zipStoragePath' => $this->zipStoragePath,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        $attachments = [];
        $attachments[] = Attachment::fromStorage($this->zipStoragePath);
        return $attachments;
    }
}
