<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReviewAcceptNotification extends Mailable
{
    use Queueable, SerializesModels;

    private $review, $organizer;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($review, $organizer)
    {
        $this->review = $review;
        $this->organizer = $organizer;
    }

    //Dać tłumaczenia
    public function build()
    {
        return $this->subject('Decyzja o przyjęciu do przeglądu')->markdown('mail.reviewacceptnotification')->with('review', $this->review)->with('organizer', $this->organizer);
    }
}
