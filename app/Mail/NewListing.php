<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewListing extends Mailable
{
    use Queueable, SerializesModels;

    public $listing;
    public $courier;
    public $url;
    public $unlistURL;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $listing, $courier )
    {
        $this->listing = $listing;
        $this->courier = $courier;

        $this->unlistURL = url("MailShot.removeMe?id=".base64_encode($courier->id));
        $this->url = url("Deliveries.detail?id=$listing->id_listing");
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails/newlisting', array(
            "listing" => $this->listing,
            "courier" => $this->courier,
            "unlistURL" => $this->unlistURL,
            "url" => $this->url
        ));
    }
}