<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderrRequestTextFreelancerMail extends Mailable
{
    use Queueable, SerializesModels;
    public $order;
    public $customer;
    public $em_parameter;
    public $ve_parameter;
    public $text;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order, $customer, $em_parameter, $ve_parameter, $text)
    {
        $this->order = $order;
        $this->customer = $customer;
        $this->em_parameter = $em_parameter;
        $this->ve_parameter = $ve_parameter;
        $this->text = $text;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        $subject = $this->order->type == 'Embroidery' ? 'New Change Embroidery Program | ' : 'New Change Vector Program | ';
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
            html: 'email.order-reqeust-text-freelancer',
            with: [
                'order' => $this->order,
                'customer' => $this->customer,
                'em_parameter' => $this->em_parameter,
                've_parameter' => $this->ve_parameter,
                'text' => $this->text,
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
        return [];
    }
}
