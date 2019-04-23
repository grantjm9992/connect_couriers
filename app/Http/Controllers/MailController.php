<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Mail\PublicMessage;

class MailController extends Controller
{
    public function __construct()
    {
        $this->secure = 1;
        parent::__construct();
    }
    const ADMIN = array(
        "phisoluciones.es@gmail.com"
    );

    public function sendAction()
    {
        $admin = self::ADMIN;
        \Mail::to ( $admin )->send ( new PublicMessage() );

        return json_encode(
            array(
                "success" => 1
            )
            );
    }    
}
