<?php

namespace App\Classes;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

use \App\User;
use \App\Listings;

use \Exception;

class ListingsOU
{
    public static function expiredDetail()
    {
        $id = $_REQUEST['id'];
        $listing = Listings::where('id_listing', $id)->first();
        if ( $_SESSION['id'] == $listing->id_user )
        {
            return view('listings/expired_detail', array(
                "data" => $listing
            ));
        }
        else
        {
            return view('error/no_permission');
        }
    }
}
