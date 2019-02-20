<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use User;

class Quotes extends Model
{
    protected $table = "quotes";

    public static function getForListing( $id = null )
    {
        if ( $id === null )
        {
            $id = $_REQUEST['id'];
        }
        $quotes = DB::select('SELECT *, (SELECT COUNT(*) FROM message_listing WHERE id_listing = quotes.id_listing) AS num_questions FROM quotes
                            LEFT JOIN users ON users.id = quotes.id_user
                            LEFT JOIN vehicles ON vehicles.id_vehicle = quotes.id_vehicle
                            LEFT JOIN time_scales ON time_scales.id_time_scale = quotes.id_time_scale
                            WHERE id_listing = '.$id);

        return $quotes;
    }

    public static function addQuote()
    {
        $date = new \DateTime();
        $quote = new Quotes;
        list($ourPrice, $userPrice, $surcharge) = Quotes::priceArray();
        $quote->num_cantidad = $ourPrice;
        $quote->num_for_user = $userPrice;
        $quote->num_surcharge = $surcharge;
        $quote->id_vehicle = $_REQUEST['id_vehicle'];
        $quote->id_time_scale = $_REQUEST['id_time_scale'];
        $quote->str_description = $_REQUEST['str_description'];
        $quote->id_listing = $_REQUEST['id_listing'];
        $quote->id_user = $_SESSION['id'];
        $quote->code_currency = "EUR";
        $quote->id_status = 1;
        $quote->date_sent = $date->format('Y-m-d H:i:s');
        $quote->save();
    }

    public static function priceArray($userPrice = null)
    {
        if ( $userPrice === null )
        {
            $userPrice = $_REQUEST['num_cantidad'];
        }

        $ourPrice = round($userPrice * 1.25, 2);
        $surcharge = $ourPrice - $userPrice;

        return array($ourPrice, $userPrice, $surcharge);
    }
}
