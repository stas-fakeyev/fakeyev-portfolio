<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ResetPassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
	 public $resetPasswordLink;
	 public $name;

    public function __construct($resetPasswordLink, $name)
    {
        //
		$this->resetPasswordLink = $resetPasswordLink;
		$this->name = $name;

    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: __('auth.reset-password-link'),
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
            view: 'mail.reset-password',
			with: [
			'resetPasswordLink' => $this->resetPasswordLink,
			'name' => $this->name,
			'mailHeader' => __('resetPasswordLinkMail.header'),
						'mailMessage' => __('resetPasswordLinkMail.message'),
			'mailFooter' => __('resetPasswordLinkMail.footer'),
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
