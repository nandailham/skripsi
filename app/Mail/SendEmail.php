<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;


    public $data_email;

    /**
     * Create a new message instance.
     *
     * @param array $data_email
     */
    public function __construct($data_email)
    {
        $this->data_email = $data_email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail = $this->subject($this->data_email['subject'])
            ->view($this->data_email['view'], ($this->data_email['data'] ?? []));

        if (isset($this->data_email['file'])) {
            $mail->attachData($this->data_email['file'], $this->data_email['file_name'] . '.pdf');
        }

        return $mail;
    }
}
