<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ListingAdmin extends Mailable
{
    use Queueable, SerializesModels;
    protected $listing;
    protected $url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($listing)
    {
        $this->listing = $listing;
        $this->url = url("Deliveries.detail?id=$listing->id_listing&title=$listing->str_title");
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails/listing_admin', array(
            "listing" => $this->listing,
            "url" => $this->url
        ));
    }
}
