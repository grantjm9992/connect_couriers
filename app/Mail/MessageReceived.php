<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MessageReceived extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;
    protected $listing;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $listing)
    {
        $this->user = $user;
        $this->listing = $listing;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails/messagereceived', array(
            "user" => $this->user,
            "listing" => $this->listing
        ));
    }
}
