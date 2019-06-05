<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\User;

class Quotes extends Model
{
    protected $table = "quotes";

    protected $primaryKey = "id_quote";

    public static function getForListing( $id = null, $limit, $status = 1 )
    {
        if ( $id === null )
        {
            $id = $_REQUEST['id'];
        }
        $quotes = DB::select("SELECT *,
                            (SELECT COUNT(*) FROM message_listing WHERE id_listing = quotes.id_listing) AS num_questions,
                            (SELECT COUNT(*) FROM user_feedback WHERE user_feedback.id_user = quotes.id_user ) AS user_feedback

                            FROM quotes
                            LEFT JOIN users ON users.id = quotes.id_user
                            LEFT JOIN vehicles ON vehicles.id_vehicle = quotes.id_vehicle
                            LEFT JOIN time_scales ON time_scales.id_time_scale = quotes.id_time_scale
                            WHERE id_status = $status AND id_listing = ".$id." ".Quotes::makeLimit($limit));

        return $quotes;
    }

    public function getCourier()
    {
        $courier = User::where('id', $this->id_user)->first();
        return $courier->str_user;
    }


    public static function addQuote()
    {
        $date = new \DateTime();
        $id_listing = $_REQUEST['id_listing'];
        $id_user = $_SESSION['id'];
        $oldQuote = Quotes::where('id_listing', $id_listing)->where('id_user', $id_user)->first();
        $quote = ( is_object( $oldQuote ) ) ? $oldQuote : new Quotes;
        $quote->amount_start = $_REQUEST['amount_start'];
        $quote->amount_min = $_REQUEST['amount_min'];
        $quote->id_vehicle = $_REQUEST['id_vehicle'];
        $quote->id_time_scale = $_REQUEST['id_time_scale'];
        if ( $_REQUEST['str_description'] != "" )
        {
            $quote->str_description = $_REQUEST['str_description'];
        }
        $quote->id_listing = $_REQUEST['id_listing'];
        $quote->id_user = $_SESSION['id'];
        $quote->code_currency = "GBP";
        $quote->id_status = 1;
        $quote->date_sent = $date->format('Y-m-d H:i:s');
        $quote->save();

        $listing = Listings::where('id_listing', $quote->id_listing)->first();
        Quotes::updateQuotesForListing($listing, $quote);

        $user = User::where('id', $_SESSION['id'])->first();
        \NotificationLogic::bidPlaced( $user, $listing );
        $notify = new Notifications;
        $notify->id_user = $listing->id_user;
        $notify->bln_notified = 0;
        $notify->str_message = "Someone has quoted on your listing: $listing->str_title";
        $notify->save();
    }

    /**
     * Update quotes on the listing which has received the quote
     * If the current lowest bid is a bid of 40£ with a reserve of 30£ and someone bids 39£ with a reserve of 32£, the lowest bid for the listing should be 31£, the current bid of the first quote should be 31£ and the current bid of the second quote should be 32£
     * If the current lowest bid is a bid of 40£ with a reserver of 30£ and someone bids 35£ with a reserve of 20£, the lowest bid for the listing should be 29£, the current bid of the first quote should be 30£ and the current bid of the second quote should be 29£
     */
    public static function updateQuotesForListing( $listing, $new_quote)
    {
        $quote = Quotes::where('id_listing', $listing->id_listing)
                        ->where('id_quote', '!=', $new_quote->id_quote)
                        ->orderBy('amount_min', 'ASC')
                        ->first();
        
        $new_low = (int)$new_quote->amount_min;
        
        if ( !is_object( $quote ) )
        {
            $listing->lowest_quote_courier = $new_quote->amount_start;
            if ( $new_quote->amount_start <= 50 )
            {
                $new_low = $new_quote->amount_start + 5;
            }
            else
            {
                $new_low = floor( $new_quote->amount_start * 1.11 );
            }
            $listing->lowest_quote = $new_low;
            $listing->id_winning_bidder = $new_quote->id_user;
            $listing->save();
            $new_quote->amount_current = $new_quote->amount_start;
            $new_quote->save();
            return true;
        }
        if ( (int)$quote->amount_min < $new_low )
        {
            $new_quote->amount_current = $new_quote->amount_min;
            $new_quote->save();
            $new_low--;
            $quote->amount_current = $new_low;
            $quote->save();
            $listing->lowest_quote_courier = $new_low;
            if ( $new_low <= 50 )
            {
                $new_low = $new_low + 5;
            }
            else
            {
                $new_low = floor( $new_low * 1.11 );
            }
            $listing->id_winning_bidder = $quote->id_user;
            $listing->lowest_quote = $new_low;
            $listing->save();
        }
        elseif ( (int)$quote->amount_min > $new_low )
        {
            $quote->amount_current = $quote->amount_min;
            $quote->save();
            $new_quote->amount_current = ( (int)$new_quote->amount_start < (int)$quote->amount_min ) ? (int)$new_quote->amount_start : (int)$quote->amount_min - 1;
            $new_quote->save();
            
            $new_low = ( (int)$new_quote->amount_start < (int)$quote->amount_min ) ? (int)$new_quote->amount_start : (int)$quote->amount_min - 1;
            $listing->lowest_quote_courier = $new_low;
            if ( $new_low <= 50 )
            {
                $new_low = $new_low + 5;
            }
            else
            {
                $new_low = floor( $new_low * 1.11 );
            }
            $listing->id_winning_bidder = $new_quote->id_user;
            $listing->lowest_quote = $new_low;
            $listing->save();

            $user = User::where('id', $quote->id_user )->first();
            \NotificationLogic::outbid( $user, $listing );
        }
        else
        {
            $quote->amount_current = $new_low;
            $quote->save();
            $new_quote->amount_current = $new_low;
            $new_quote->save();

            $listing->lowest_quote_courier = $new_low;
            if ( $new_low <= 50 )
            {
                $new_low = $new_low + 5;
            }
            else
            {
                $new_low = floor( $new_low * 1.11 );
            }
            $listing->id_winning_bidder = $new_quote->id_user.", ".$quote->id_user;
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

    public static function getMySummary()
    {
        $active = Quotes::myActiveQuotes();
        $outbid = Listings::myOutbidQuotes();
        $completed = Quotes::myCompletedQuotes();
        $accepted = Quotes::myAcceptedQuotes();
        $unsuccessful = Quotes::myUnsuccessfulQuotes();
        $watching = Watching::where('id_user', $_SESSION['id'])->get();

        return array(
            count( $active ),
            count( $outbid ),
            count( $accepted ),
            count( $unsuccessful ),
            count( $completed ),
            count( $watching )
        );
    }

    public static function myCompletedQuotes()
    {
        return Quotes::where('id_user', $_SESSION['id'])
                    ->where('id_status', 4)
                    ->get();
    }

    public static function myAcceptedQuotes()
    {
        return Quotes::where('id_user', $_SESSION['id'])
                    ->where('id_status', 2)
                    ->get();
    }

    public static function myUnsuccessfulQuotes()
    {
        return Quotes::where('id_user', $_SESSION['id'])
                    ->whereRaw('id_status = 3 OR id_status = 5')
                    ->get();
    }

    public static function myActiveQuotes()
    {
        $id = $_SESSION['id'];

        $quotes = DB::select(
            "SELECT * FROM listings LEFT JOIN quotes ON listings.id_listing = quotes.id_listing
            WHERE quotes.id_user = $id
            AND quotes.id_status = 1
            AND listings.id_status = 1
            AND listings.expires_on >= NOW() "
        );
        foreach ( $quotes as $quote )
        {
            $winning_quote = Quotes::where('id_user', $quote->id_winning_bidder)
                            ->where('id_listing', $quote->id_listing)->first();
            if ( is_object( $winning_quote ) )
            {
                $quote->lowest_quote = $winning_quote->amount_current;
            }
        }
        return $quotes;
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
