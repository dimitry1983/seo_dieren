<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $emailAddress; // rename to avoid collision with Mailable's internal $this->email
    public $subjectLine;
    public $messageContent;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $emailAddress, $subjectLine, $bodyMessage)
    {
        $this->name        = $name;
        $this->emailAddress = $emailAddress;
        $this->subjectLine = $subjectLine;
        $this->messageContent = $bodyMessage;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->from($this->emailAddress)
                    ->subject($this->subjectLine)
                    ->view('emails.contact'); // point to your Blade template
    }
}