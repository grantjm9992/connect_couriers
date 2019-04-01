<?php

namespace App\Classes;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

use \App\User;
use \App\Verify;

use \Exception;
use \App\Mail\AdminCheckUsername;

class PermissionLogic {

    const ADMINISTRATORS = array("phisoluciones.es@gmail.com","gary@gmacd.co.uk");
    public static function sendSignupCheck($username = null)
    {
        $username = ( $username !== null ) ? $username : $_REQUEST['username'];

        // Al crear, inlcuir dos enlaces para poder rechazar o acceptar el usuario directamente
        $key = time();
        $secret = "";
        $length = 10;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        for ($i = 0; $i < $length; $i++) {
            $secret .= $characters[rand(0, $charactersLength - 1)];
        }
        $secret = md5( $secret );
        $secret = md5( $key );
        $verify = new Verify;
        $verify->secret = $secret;
        $verify->key = $key;
        $verify->username = $username;
        $verify->save();
        $url_accept = "http://localhost/connect_couriers/public/VerifyUser?key=$key&secret=$secret&accept=1";
        $url_remove = "http://localhost/connect_couriers/public/VerifyUser?key=$key&secret=$secret&accept=0";
        $admin = self::ADMINISTRATORS;
        $headers = "Reply-To: ".env('FROM_EMAIL')."\r\n"; 
        $headers .= "Return-Path: ".env('FROM_EMAIL')."\r\n";
        $headers .= "From: ".env('FROM_EMAIL')."\r\n"; 
        $headers .= "Organization: Couriers Connect\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
        $headers .= "X-Priority: 3\r\n";
        $headers .= "X-Mailer: PHP". phpversion() ."\r\n"; 
        //\mail($admin, "New user", view('admin/usernamemail', array( "username" => $username ) ), $headers );
         \Mail::to( $admin )->send( new AdminCheckUsername( $username, $url_accept, $url_remove ) );
    }
}
