<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Attachment;

class ChangeVeFreelacnerEndJobAdminMail extends Mailable
{
    use Queueable, SerializesModels;
    public $order;
    public $customer;
    public $files;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order, $customer, $files)
    {
        $this->order = $order;
        $this->customer = $customer;
        $this->files = $files;
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
            subject: 'Abgeschlossene Bestellung Stickprogramm | ' . $this->order->order_number,
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
            html: 'email.change-ve-freelancer-end-job-admin',
            with: [
                'order' => $this->order,
                'customer' => $this->customer,
                'files' => $this->files,
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
        foreach ($this->files as $file) {
            $attachments[] = Attachment::fromStorage($file);
        }
        return $attachments;
    }
}
