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
        \Mail::to( $admin )->send( new AdminCheckUsername( $username ) );
    }
}
