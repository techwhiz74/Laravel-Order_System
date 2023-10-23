<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;
class inviteEmployeeMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;
    public $inviteLink;

    public $customer;
    public function __construct($data, $inviteLink,$customer)
    {
        $this->data = $data;
        $this->inviteLink = $inviteLink;
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

            from: new Address(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME')),
                subject: 'You have got an invitation from'.$this->customer['name'],
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
            view: 'email.invite-employee',
            with: [
                'data' => $this->data,
                'customer' =>$this->customer,
                'inviteLink'=> $this->inviteLink,
            ],

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
