<?php

namespace App\Classes;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

use \App\User;
use \App\Listings;
use \App\Quotes;

use \Exception;

class ListingsOU
{


    public function __construct()
    {

    }
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

    public static function paginatedQuotes($id)
    {
        $listing = Listings::where('id_listing', $id)->first();
        $html = "";
        $page = ( isset( $_REQUEST['page'] ) && $_REQUEST['page'] != "" ) ? $_REQUEST['page'] : 1;
        $quotes = Quotes::getForListing($id, $page);
        $disabledUp = ( count( $quotes ) < 20 ) ? "disabled" : "";
        $disabledDown = ( (int)$page === 1 ) ? "disabled" : "";
        foreach ( $quotes as $quote )
        {
            $html .= view('listings/quote_card', array(
                "quote" => $quote
            ));
        }

        return view('comun/pagination', array(
            "disabledup" => $disabledUp,
            "disableddown" => $disabledDown,
            "data" => $html
        ));
    }
}
