<?php

namespace App\Classes;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

use \App\User;
use \App\Listings;
use \App\Quotes;

use \Exception;

class QuotesOU
{
    public function __construct()
    {

    }

    public static function process( $quote )
    {
        $quote->id_quote = base64_encode( $quote->id_quote );

        return view('quote/process');
    }

    public static function withdraw()
    {
        $id_quote = base64_decode( $_REQUEST['id_quote'] );
        $quote = Quotes::where('id_quote', $id_quote)->first();
        $quote->id_status = 5;
        $quote->save();

        return \Redirect::to( url( 'MyQuotes.myUnsuccessfulQuotes' ) );
    }
}
