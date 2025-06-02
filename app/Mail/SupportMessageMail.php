<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailables\Content;

class SupportMessageMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $messageContent;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $messageContent)
    {
        $this->user = $user;
        $this->messageContent = $messageContent."\n\n".__('Contact gegevens').': '.$this->user->email."\n".$this->user->name."\n";
       
    }


    /**
     * 
     * 
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Support aanvraag seowebsite: ' . $this->user->name)
        ->markdown('emails.support-message')
        ->with([
            'user' => $this->user,
            'messageContent' => $this->messageContent
        ]);
    }
}