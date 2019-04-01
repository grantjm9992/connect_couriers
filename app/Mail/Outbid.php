<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Outbid extends Mailable
{
    use Queueable, SerializesModels;
    protected $user;
    protected $url;
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
        $this->url = url('/MyQuotes.myOutbidQuotes');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails/outbid', array(
            "user" => $this->user,
            "listing" => $this->listing,
            "url" => $this->url
        ));
    }
}
