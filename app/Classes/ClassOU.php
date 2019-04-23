<?php

namespace App\Classes;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

use \App\User;
use \Exception;

class ClassOU
{
    public function __construct()
    {

    }

    public static function getUserById( $id = null )
    {
        $id = ( is_null ( $id ) ) ? $_SESSION['id'] : $id;
        return User::where('id', $id)->first();
    }
}
