<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdminCheckUsername extends Mailable
{
    use Queueable, SerializesModels;

    protected $username;
    protected $url_accept;
    protected $url_remove;
    /**
     * Create a new message instance.
     * Send email to admin to verify that the username doesn't include any business names
     * @return void
     */
    public function __construct(string $username, string $url_accept, string $url_remove )
    {
        $this->username = $username;
        $this->url_accept = $url_accept;
        $this->url_remove = $url_remove;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
                ->view('admin/usernamemail', array(
            "username" => $this->username,
            "url_accept" => $this->url_accept,
            "url_remove" => $this->url_remove
        ));
        //return $this->view('view.name');
    }


}
