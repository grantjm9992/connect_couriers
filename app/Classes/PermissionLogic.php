<?php

namespace App\Classes;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

use \App\User;

use \Exception;
use \App\Mail\AdminCheckUsername;

class PermissionLogic {

    const ADMINISTRATORS = [
        "phisoluciones.es@gmail.com",
        "gary@gmacd.co.uk"
    ];

    public static function sendSignupCheck($username = null)
    {
        $username = ( $username !== null ) ? $username : $_REQUEST['username'];

        $admin = self::ADMINISTRATORS;
        $headers = "Reply-To: ".env('FROM_EMAIL')."\r\n"; 
        $headers .= "Return-Path: ".env('FROM_EMAIL')."\r\n";
        $headers .= "From: ".env('FROM_EMAIL')."\r\n"; 
        $headers .= "Organization: Couriers Connect\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
        $headers .= "X-Priority: 3\r\n";
        $headers .= "X-Mailer: PHP". phpversion() ."\r\n"; 
        \mail($admin, "New user", view('admin/usernamemail', array( "username" => $username ) ), $headers );
        // \Mail::to( $admin )->send( new AdminCheckUsername( $username ) );
    }
}
