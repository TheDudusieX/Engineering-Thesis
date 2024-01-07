<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class JuryMail extends Mailable
{
    use Queueable, SerializesModels;

    private $mail, $password;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mail, $password)
    {
        $this->mail = $mail;
        $this->password = $password;
    }

    //Dać tłumaczenia
    public function build()
    {
        return $this->subject('Utworzenie konta na stronie PrzeglądyiFestiwale')->markdown('mail.jurymail')->with('mail', $this->mail)->with('password', $this->password);
    }
}
