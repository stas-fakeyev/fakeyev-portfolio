<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CreateUserMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $user;
    protected $setPasswordUrl;

    public function __construct($notifiable, $setPasswordUrl)
    {
        //
        $this->user = $notifiable;
        $this->setPasswordUrl = $setPasswordUrl;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: __('users/mail.subject-create'),
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
            view: 'mail.create-user',
            with: [
            'user' => $this->user,
            'setPasswordUrl' => $this->setPasswordUrl,
            'mailHeader' => __('users/mail.header-create'),
            'mailMessage' => __('users/mail.message-create'),
                                    'setPasswordLink' => __('users/mail.set-password-link'),
            'mailFooter' => __('users/mail.footer-create'),
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
