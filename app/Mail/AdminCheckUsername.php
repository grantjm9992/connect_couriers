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
    /**
     * Create a new message instance.
     * Send email to admin to verify that the username doesn't include any business names
     * @return void
     */
    public function __construct(string $username )
    {
        $this->username = $username;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('admin/usernamemail', array(
            "username" => $username
        ));
        //return $this->view('view.name');
    }


}
