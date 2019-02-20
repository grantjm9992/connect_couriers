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
}
