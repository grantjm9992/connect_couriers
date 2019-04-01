<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class QuoteReceived extends Mailable
{
    use Queueable, SerializesModels;
    protected $user;
    protected $listing;
    protected $url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $listing)
    {
        $this->user = $user;
        $this->listing = $listing;
        $this->url = url("/MyListings.quotes?id=$listing->id_listing");
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails/quotereceived', array(
            "user" => $this->user,
            "url" => $this->url,
            "listing" => $this->listing
        ));
    }
}
