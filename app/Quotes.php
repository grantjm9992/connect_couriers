<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use User;

class Quotes extends Model
{
    protected $table = "quotes";

    protected $primaryKey = "id_quote";

    public static function getForListing( $id = null, $limit )
    {
        if ( $id === null )
        {
            $id = $_REQUEST['id'];
        }
        $quotes = DB::select('SELECT *,
                            (SELECT COUNT(*) FROM message_listing WHERE id_listing = quotes.id_listing) AS num_questions,
                            (SELECT COUNT(*) FROM user_feedback WHERE user_feedback.id_user = quotes.id_user ) AS user_feedback

                            FROM quotes
                            LEFT JOIN users ON users.id = quotes.id_user
                            LEFT JOIN vehicles ON vehicles.id_vehicle = quotes.id_vehicle
                            LEFT JOIN time_scales ON time_scales.id_time_scale = quotes.id_time_scale
                            WHERE id_status = 1 AND id_listing = '.$id.Quotes::makeLimit($limit));

        return $quotes;
    }

    public static function addQuote()
    {
        $date = new \DateTime();
        $quote = new Quotes;
        $quote->amount_start = $_REQUEST['amount_start'];
        $quote->amount_min = $_REQUEST['amount_min'];
        $quote->id_vehicle = $_REQUEST['id_vehicle'];
        $quote->id_time_scale = $_REQUEST['id_time_scale'];
        $quote->str_description = $_REQUEST['str_description'];
        $quote->id_listing = $_REQUEST['id_listing'];
        $quote->id_user = $_SESSION['id'];
        $quote->code_currency = "EUR";
        $quote->id_status = 1;
        $quote->date_sent = $date->format('Y-m-d H:i:s');
        $quote->save();

        $listing = Listings::where('id_listing', $quote->id_listing)->first();
        Quotes::updateQuotesForListing($listing, $quote);
    }

    /**
     * Update quotes on the listing which has received the quote
     * If the current lowest bid is a bid of 40€ with a reserve of 30€ and someone bids 39€ with a reserve of 32€, the lowest bid for the listing should be 31€, the current bid of the first quote should be 31€ and the current bid of the second quote should be 32€
     * If the current lowest bid is a bid of 40€ with a reserver of 30€ and someone bids 35€ with a reserve of 20€, the lowest bid for the listing should be 29€, the current bid of the first quote should be 30€ and the current bid of the second quote should be 29€
     */
    public static function updateQuotesForListing( $listing, $new_quote)
    {
        $quote = Quotes::where('id_listing', $listing->id_listing)
                        ->where('id_quote', '!=', $new_quote->id_quote)
                        ->orderBy('amount_min', 'ASC')
                        ->first();
        
        $new_low = (int)$new_quote->amount_min;
        
        if ( (int)$quote->amount_min < $new_low )
        {
            $new_quote->amount_current = $new_quote->amount_min;
            $new_quote->save();
            $new_low--;
            $quote->amount_current = $new_low;
            $quote->save();
            
            if ( $new_low <= 50 )
            {
                $new_low = $new_low + 5;
            }
            else
            {
                $new_low = floor( $new_low * 1.11 );
            }
            $listing->lowest_quote = $new_low;
            $listing->save();
        }
        elseif ( (int)$quote->amount_min > $new_low )
        {
            $quote->amount_current = $quote->amount_min;
            $quote->save();
            $new_quote->amount_current = (int)$quote->amount_min - 1;
            $new_quote->save();
            
            $new_low = (int)$quote->amount_min - 1;
            if ( $new_low <= 50 )
            {
                $new_low = $new_low + 5;
            }
            else
            {
                $new_low = floor( $new_low * 1.11 );
            }
            $listing->lowest_quote = $new_low;
            $listing->save();
        }
        else
        {
            $quote->amount_current = $new_low;
            $quote->save();
            $new_quote->amount_current = $new_low;
            $new_quote->save();
            
            if ( $new_low <= 50 )
            {
                $new_low = $new_low + 5;
            }
            else
            {
                $new_low = floor( $new_low * 1.11 );
            }
            $listing->lowest_quote = $new_low;
            $listing->save();
        }
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

    public static function makeLimit( $page )
    {
        if ( $page !== null )
        {
            $limit = ( (int)$page - 1 )*20;
            return " LIMIT $limit, 20 ";
        }
        else
        {
            return "";
        }
    }

    public static function getMessages( $quote )
    {
        $conversation = Conversations::where('id_quote', $quote->id_quote)->where('bln_is_private', 0)->first();
        if ( is_object( $conversation ) )
        {
            $messages = DB::select("SELECT * FROM messages_sent LEFT JOIN users ON users.id = messages_sent.id_sender WHERE messages_sent.id_conversation = $conversation->id ORDER BY date_sent ASC");
        }
        else 
        {
            $messages = null;
        }
        return $messages;
    }
}
