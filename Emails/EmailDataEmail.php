<?php

declare(strict_types=1);

namespace Modules\Notify\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Queue\SerializesModels;
use Modules\Notify\Datas\EmailData;

class EmailDataEmail extends Mailable
{
    use Queueable;
    use SerializesModels;

    public function __construct(public EmailData $email_data) {}

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address($this->email_data->from_email,$this->email_data->from),
            subject: $this->email_data->subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            html: 'notify::emails.html',
            text: 'notify::emails.text',
            with: [
                'email_data' => $this->email_data,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
            //Attachment::fromPath('/path/to/file'),
        ];
    }
}
