<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PublicMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $fromPerson;
    public $txt;
    public $fromEmail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->fromPerson = $_REQUEST['name'];
        $this->from($_REQUEST['email']);
        $this->txt = $_REQUEST['message'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails/publicmessage', array(
            "fromPerson" => $this->fromPerson,
            "fromEmail" => $this->fromEmail,
            "txt" => $this->txt
        ));
    }
}
