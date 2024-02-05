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
    public $en_order;
    public $customer;
    public $em_parameter;
    public $en_em_parameter;
    public $ve_parameter;
    public $text;
    public $zipStoragePath;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order, $en_order, $customer, $em_parameter, $en_em_parameter, $ve_parameter, $text, $zipStoragePath)
    {
        $this->order = $order;
        $this->en_order = $en_order;
        $this->customer = $customer;
        $this->em_parameter = $em_parameter;
        $this->en_em_parameter = $en_em_parameter;
        $this->ve_parameter = $ve_parameter;
        $this->text = $text;
        $this->zipStoragePath = $zipStoragePath;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        $subject = $this->order->type == 'Embroidery' ? 'New Change Request Embroidery Files | ' : 'New Change Request Vector Files | ';
        $subject .= $this->customer->customer_number . '-' . $this->order->order_number;

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
                'en_order' => $this->en_order,
                'customer' => $this->customer,
                'em_parameter' => $this->em_parameter,
                'en_em_parameter' => $this->en_em_parameter,
                've_parameter' => $this->ve_parameter,
                'text' => $this->text,
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
