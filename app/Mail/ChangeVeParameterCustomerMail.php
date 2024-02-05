<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ChangeVeParameterCustomerMail extends Mailable
{
    use Queueable, SerializesModels;
    public $parameter_old;
    public $parameter_new;
    public $customer;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($parameter_old, $parameter_new, $customer)
    {
        $this->parameter_old = $parameter_old;
        $this->parameter_new = $parameter_new;
        $this->customer = $customer;
    }
    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            from: env('MAIL_FROM_ADDRESS'),
            subject: 'Änderung Parameter Vektordateien | ' . $this->customer->customer_number,
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
            html: 'email.change-ve-parameter-customer',
            with: [
                'parameter_old' => $this->parameter_old,
                'parameter_new' => $this->parameter_new,
                'customer' => $this->customer,
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
