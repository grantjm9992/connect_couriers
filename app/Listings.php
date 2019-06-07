<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

use \App\ImagesListings;

use \App\Providers\TranslationProvider as Translator;

class Listings extends Model
{
    protected $table = "listings";
    protected $primaryKey = "id_listing";

    protected $fillable = [
        "str_title", "id_category", "str_description", "height", "width", "length", "weight", "weight_unit", "length_unit", "collection_postcode", "delivery_postcode", "distance", "id_time_scale"
    ];

    public static function getListingWithUser($id)
    {
        $data = DB::select('SELECT * FROM listings LEFT JOIN users ON users.id = listings.id_user WHERE id_listing = '.$id);

        if ( count( $data ) > 0)
        {
            return $data[0];
        }
        else
        {
            return null;
        }

    }

    public function updateFromForm()
    {
        $this->update($_REQUEST);
        $this->updateItems();
        if ( $_REQUEST['collection_postcode'] != $_REQUEST['original_cpo'] || $_REQUEST['delivery_postcode'] != $_REQUEST['original_dpo'] )
        {
            $origin = urlencode($this->collection_postcode);
            $destination = urlencode($this->delivery_postcode);
            $url = "https://maps.googleapis.com/maps/api/distancematrix/json?&origins=$origin&destinations=$destination&key=AIzaSyAAs6KdmD9OYa2BHZb734w7dmA0QWWa5Dk";
            $data = json_decode( file_get_contents ( $url ) );
            if ( is_object ( $data->rows[0]->elements[0]->distance ) && !is_null ( $data->rows[0]->elements[0]->distance ) )
            {
                $this->distance = $data->rows[0]->elements[0]->distance->text;
            }
        }
        $this->save();
    }

    public function getItems()
    {
        return Items::where('id_listing', $this->id_listing)->get();
    }

    public function updateItems()
    {
        $items = Items::where('id_listing', $this->id_listing)->get();
        foreach ( $items as $item )
        {
            if ( isset ( $_REQUEST["str_description_$item->id"] ) && $_REQUEST["str_description_$item->id"] != "" ) $item->str_description = $_REQUEST["str_description_$item->id"];
            if ( isset ( $_REQUEST["length_$item->id"] ) && $_REQUEST["length_$item->id"] != "" ) $item->length = $_REQUEST["length_$item->id"];
            if ( isset ( $_REQUEST["width_$item->id"] ) && $_REQUEST["width_$item->id"] != "" ) $item->width = $_REQUEST["width_$item->id"];
            if ( isset ( $_REQUEST["height_$item->id"] ) && $_REQUEST["height_$item->id"] != "" ) $item->height = $_REQUEST["height_$item->id"];
            if ( isset ( $_REQUEST["length_unit_$item->id"] ) && $_REQUEST["length_unit_$item->id"] != "" ) $item->length_unit = $_REQUEST["length_unit_$item->id"];
            if ( isset ( $_REQUEST["weight_$item->id"] ) && $_REQUEST["weight_$item->id"] != "" ) $item->weight = $_REQUEST["weight_$item->id"];
            if ( isset ( $_REQUEST["weight_unit_$item->id"] ) && $_REQUEST["weight_unit_$item->id"] != "" ) $item->weight_unit = $_REQUEST["weight_unit_$item->id"];
            $item->save();
        }
    }

    protected function getDistance($cpc, $dpc)
    {
        //Random number until Google API is installed
        return rand(10, 9000)/10;
    }

    public static function cloneFromId($id)
    {
        $date = new \DateTime();
        $original = Listings::where('id_listing', $id)->first();
        $new = new Listings;
        /*
        $new = Listings::create( $original->getAttributes() );
        */
        $new->date_listed = $date->format('Y-m-d H:i:s');
        $new->id_status = "1";
        $date->modify('+ 1 month');
        $new->expires_on = $date->format('Y-m-d H:i:s');

        $new->str_title = $original->str_title;
        $new->str_description = $original->str_description;
        $new->id_user = $original->id_user;
        $new->id_category = $original->id_category;
        $new->id_priority = $original->id_priority;
        $new->collection_postcode = $original->collection_postcode;
        $new->delivery_postcode = $original->delivery_postcode;
        $new->height = $original->height;
        $new->width = $original->width;
        $new->length = $original->length;
        $new->units = $original->units;
        $new->weight = $original->weight;
        $new->distance = $original->distance;
        $new->save();

        $listing_images = ImagesListings::where('id_listing', $id)->get();
        foreach ( $listing_images as $li )
        {
            $il = new ImagesListings;
            $il->id_listing = $new->id_listing;
            $il->file_name = $li->file_name;
            $il->save();
        }

        return $new;
    }

    public static function myActiveListings()
    {        
        $data = DB::select('SELECT *, listing_status.description AS status, (SELECT COUNT(*) FROM quotes WHERE quotes.id_listing = listings.id_listing AND quotes.id_status = 1) AS quotes FROM listings LEFT JOIN listing_status ON listing_status.id = listings.id_status WHERE id_user = '.$_SESSION['id'].' AND id_status = 1 AND expires_on > NOW()' );
        return Listings::makeSearchArray( $data );
    }
    public static function myExpiredListings()
    {
        $data = DB::select('SELECT *, listing_status.description AS status, (SELECT COUNT(*) FROM quotes WHERE quotes.id_listing = listings.id_listing) AS quotes FROM listings LEFT JOIN listing_status ON listing_status.id = listings.id_status WHERE id_user = '.$_SESSION['id'].' AND ( id_status = 3 OR ( id_status = 1 AND expires_on < NOW() ) )' );
        return Listings::makeSearchArray( $data );
    }
    public static function myAcceptedListings()
    {
        return Listings::where('id_user', $_SESSION['id'])->where('id_status', 2)->get();
    }

    public static function addListing($dontSave = false)
    {
        $date = new \DateTime();
        $listing = self::create($_REQUEST);
        $listing->date_listed = $date->format('Y-m-d H:i:s');
        if ( isset( $_SESSION['id'] ) && $_SESSION['id'] != "" ) $listing->id_user = $_SESSION['id'];
        if ( isset( $_REQUEST['delivery_date'] ) && $_REQUEST['delivery_date'] != "" )
        {
            $dd1 = new \DateTime($_REQUEST['delivery_date']);
            $listing->delivery_date1 = $dd1->format('Y-m-d');
        }
        $date->modify('+ 1 month');
        $listing->expires_on = $date->format('Y-m-d H:i:s');
        
        // Get distance and time from Google API
        $origin = urlencode($_REQUEST['collection_postcode']);
        $destination = urlencode($_REQUEST['delivery_postcode']);
        $listing->save();
        $url = "https://maps.googleapis.com/maps/api/distancematrix/json?&origins=$origin&destinations=$destination&key=AIzaSyAAs6KdmD9OYa2BHZb734w7dmA0QWWa5Dk";

        $data = json_decode( file_get_contents ( $url ) );
        if ( is_object( $data ) && is_object( $data->rows ) && is_object( $data->rows->elements ) && is_object ( $data->rows[0]->elements[0]->distance ) && !is_null ( $data->rows[0]->elements[0]->distance ) )
        {
            $listing->distance = $data->rows[0]->elements[0]->distance->text;
        }
        if ( $dontSave === true ) return $listing;

        \NotificationLogic::newListingAdmin( $listing );

        $listing->save();
    }

    
    public static function getMyListingsCount()
    {
        
        $active = DB::select('SELECT * FROM listings WHERE id_user = '.$_SESSION['id'].' AND id_status = 1 AND expires_on > NOW() ');
                                
        $accepted = \App\Listings::where('id_user', $_SESSION['id'])
                                ->where('id_status', 2)->get();

        $ended = DB::select('SELECT * FROM listings WHERE id_user = '.$_SESSION['id'].' AND ( id_status = 3 OR ( id_status = 1 AND expires_on < NOW() ) )');
        
        return array(
            'active' => count($active),
            'accepted' => count($accepted),
            'expired' => count($ended)
        );
    }

    public static function addUserFirst()
    {
        $str_email = $_REQUEST['str_email'];
        $user = User::where('str_email', $str_email)->first();
        if ( is_object( $user ) )
        {
            if ( $user->id_user_type == "1" )
            {
                if ( $user->str_password != "" )
                {
                    $listing = self::AddListing(true);
                    $_SESSION['listingToAdd'] = $listing;
                    \Redirect::to('Login')->send();
                }
                $_SESSION['id'] = $user->id;
                $_SESSION['user'] = rtrim($user->str_name).' '.rtrim($user->str_surname);
                $_SESSION['id_user_type'] = 1;
    
                Listings::addListing();
            }
            else
            {
                $_SESSION['errors'] = "User already exists@#";
                die (\Redirect::to('Login'));
            }
        }
        else
        {
            $date = new \DateTime();
            $user = new User;
            $user->str_email = $str_email;
            $user->date_created = $date->format('Y-m-d H:i:s');
            $user->date_last_access = $date->format('Y-m-d H:i:s');
            
            // Call from LoginController
            $str_user = \App\Http\Controllers\LoginController::createUsername( $user->str_email );
            $user->str_user = $str_user;
            $user->id_user_type = 1;

            $user->save();
            $id = $user->id;
            $_SESSION['id'] = $user->id;
            $_SESSION['user'] = rtrim($user->str_name).' '.rtrim($user->str_surname);
            $_SESSION['id_user_type'] = 1;

            \NotificationLogic::userSignedUp( $user );
            Listings::addListing();
        }
    }
    
    public static function getListingDetail($id = null)
    {
        if ( $id ===  null )
        {
            $id = $_REQUEST['id'];
        }
        $listing_array = DB::select('SELECT *, (SELECT COUNT(*) FROM user_feedback WHERE user_feedback.id_user = listings.id_user) AS feedback_user FROM listings
                                    LEFT JOIN users ON listings.id_user = users.id
                                    WHERE id_listing = '.$id);
        
        foreach ( $listing_array as $listing )
        {
            if ( isset ( $_SESSION['id_user_type'] ) && (int)$_SESSION['id_user_type'] === 2 )
            {
                $quote = Quotes::where('id_user', $listing->id_winning_bidder)
                                ->where('id_listing', $id)->first();
                if ( is_object( $quote ) )
                {
                    $listing->lowest_quote = $quote->amount_current;
                }
            }
        }
        return $listing_array[0];
    }

    public function getAcceptedQuote()
    {
        $quote = \App\Quotes::where('id_status', 2)->where('id_listing', $this->id_listing)->first();
        //die( var_dump ( $quote ) );
        return $quote;
    }

    public static function myListingCards()
    {
        $data = Listings::where('id_user', $_SESSION['id'])->get();

        $arr = array();
        foreach ( $data as $row )
        {
            switch( $row->id_status )
            {
                case "1":
                    $row->status = "<span style='color: green'>".Providers\TranslationProvider::get_translation('status_'.$row->id_status)."</span>";
                    break;
                case "2":
                    $row->status = "<span style='color: red'>".Providers\TranslationProvider::get_translation('status_'.$row->id_status)."</span>";
                    break;
                case "3":
                    $row->status = "<span style='color: blue'>".Providers\TranslationProvider::get_translation('status_'.$row->id_status)."</span>";
                    break;
            }
            $arr[] = array(
                'id_listing' => $row->id_listing,
                'id_user' => $row->id_user,
                'str_title' => $row->str_title,
                'str_description' => $row->str_description,
                'date_listed' => $row->date_listed,
                'url_image' => $row->url_image,
                'collection_postcode' => $row->collection_postcode,
                'delivery_postcode' => $row->delivery_postcode,
                'id_status' => $row->id_status,
                'status' => $row->status
            );
        }
        return $arr;
    }

    protected static function makeListingArray($ds)
    {
        $arr = array();
        foreach( $ds as $row )
        {
            $arr[] = array(
                'id_listing' => $row->id_listing,
                'str_title' => $row->str_title,
                'str_descripcion' => $row->str_descripcion,
                'image' => $row->image

            );
        }
        return $arr;
    }

    public static function getSearch()
    {
        $data = DB::select('SELECT *, ( SELECT file_name FROM images_listings WHERE images_listings.id_listing = listings.id_listing LIMIT 1) AS file_name, listing_status.description AS status, (SELECT COUNT(*) FROM quotes WHERE quotes.id_listing = listings.id_listing AND quotes.id_status = 1) AS quotes FROM listings LEFT JOIN listing_status ON listing_status.id = listings.id_status WHERE listings.expires_on > NOW() AND listings.id_status = 1 '.Listings::makeWhere().Listings::makeOrder());
        return Listings::makeSearchArray( $data );
    }

    private static function makeSearchArray( $ds )
    {
        foreach ( $ds as $row )
        {
            $row->expires_in = Listings::makeTimeDifferenceNegative($row->expires_on);
            $d = new \DateTime($row->expires_on);
            $row->expires_on = $d->format('d/m/Y');
            $row->date_listed = Listings::makeTimeDifference($row->date_listed);
        }
        return $ds;
    }

    private static function makeTimeDifferenceNegative($dateTime)
    {
        $response = "";
        $date = new \DateTime($dateTime);
        $now = new \DateTime();

        $interval = $date->diff($now);
        $diffDays = (int)$interval->format('%R%a');
        
        if ( $diffDays === 0 )
        {
            $seconds = $date->getTimestamp() - $now->getTimestamp();
            if ( (int)$seconds < 60 )
            {
                $response = \str_replace("<seconds>", $seconds, Translator::get_translation('seconds_to_go') );
                if ( (int)$seconds === 1 )
                {
                    $response = \str_replace("<seconds>", $seconds, Translator::get_translation('second_to_ago') );                    
                }
            }
            elseif ( (int)$seconds < 3600 )
            {
                $minutes = floor($seconds/60);
                $response = \str_replace("<minutes>", $minutes, Translator::get_translation('minutes_to_ago') );
                if ( (int)$minutes === 1 )
                {
                    $response = \str_replace("<minutes>", $minutes, Translator::get_translation('minute_to_ago') );                    
                }
            }
            else
            {
                $hours = floor($seconds/3600);
                $response = \str_replace("<hours>", $hours, Translator::get_translation('hours_to_ago'));
                if ( (int)$hours === 1 )
                {
                    $response = \str_replace("<hours>", $hours, Translator::get_translation('hour_to_ago') );
                }
            }
        }
        else
        {
            $response = $date->format('d/m/Y');
        }
        return $response;
    }

    private static function makeTimeDifference($dateTime)
    {
        $response = "";
        $date = new \DateTime($dateTime);
        $now = new \DateTime();

        $interval = $now->diff($date);
        $diffDays = (int)$interval->format('%R%a');

        if ( $diffDays === 0 )
        {
            $seconds = $now->getTimestamp() - $date->getTimestamp();
            if ( $seconds < 60 )
            {
                $response = \str_replace("<seconds>", $seconds, Translator::get_translation('seconds_ago') );
                if ( (int)$seconds === 1 )
                {
                    $response = \str_replace("<seconds>", $seconds, Translator::get_translation('second_ago') );                    
                }
            }
            elseif ( $seconds < 3600 )
            {
                $minutes = floor($seconds/60);
                $response = \str_replace("<minutes>", $minutes, Translator::get_translation('minutes_ago') );
                if ( (int)$minutes === 1 )
                {
                    $response = \str_replace("<minutes>", $minutes, Translator::get_translation('minute_ago') );                    
                }
            }
            else
            {
                $hours = floor($seconds/3600);
                $response = \str_replace("<hours>", $hours, Translator::get_translation('hours_ago'));
                if ( (int)$hours === 1 )
                {
                    $response = \str_replace("<hours>", $hours, Translator::get_translation('hour_ago') );
                }
            }
        }
        else
        {
            $response = $date->format('d/m/Y');
        }
        return $response;
    }


    private static function makeWhere($filters = null )
    {
        $where = "";

        if ( isset( $_REQUEST['query'] ) && $_REQUEST['query'] != "" )
        {
            $where .= " AND (str_title LIKE '%".$_REQUEST['query']."%' OR str_description LIKE '%".$_REQUEST['query']."%' ) ";
        }
        if ( isset( $_REQUEST['no_quotes'] ) && $_REQUEST['no_quotes'] == "1" )
        {
            $where .= " AND (SELECT COUNT(*) FROM quotes WHERE quotes.id_listing = listings.id_listing) = 0 ";
        }

        if( isset( $_REQUEST['id_category'] ) && $_REQUEST['id_category'] != "" ) $where .= " AND listings.id_category = ".$_REQUEST['id_category']." ";

        return $where;
    }

    private static function makeOrder()
    {
        if ( isset ( $_REQUEST['order'] ) && $_REQUEST['order'] != "" )
        {
            $order_array = explode(',', $_REQUEST['order']);
            $order = " ORDER BY ".$order_array[0]." ".$order_array[1]. " ";
        }
        else
        {
            $order = " ORDER BY listings.date_listed DESC ";
        }
        return $order;
    }

    public function getQuotes()
    {
        $quotes = DB::select('SELECT *,
                (SELECT COUNT(*) FROM message_listing WHERE id_listing = quotes.id_listing) AS num_questions,
                (SELECT COUNT(*) FROM user_feedback WHERE user_feedback.id_user = quotes.id_user ) AS user_feedback
                FROM quotes
                LEFT JOIN users ON users.id = quotes.id_user
                LEFT JOIN vehicles ON vehicles.id_vehicle = quotes.id_vehicle
                LEFT JOIN time_scales ON time_scales.id_time_scale = quotes.id_time_scale
                WHERE id_status = 1 AND id_listing = '.$this->id_listing);

        return $this->publicArray($quotes);
    }

    public function publicArray( $ds )
    {
        foreach ( $ds as $row )
        {
            
            if ( !isset ( $_SESSION['id_user_type'] ) || (int)$_SESSION['id_user_type'] !== 2 )
            {
                $current = (int)$row->amount_current;
                if ( $current <= 50 )
                {
                    $row->num_cantidad = $current + 5;
                }
                else
                {
                    $row->num_cantidad = floor( $current * 1.11 );
                }
            }
            else
            {
                $row->num_cantidad = (int)$row->amount_current;
            }
            
        }
        return $ds;
    }

    public function getConversations()
    {
        $arr = array();
        $conv = DB::select("SELECT * FROM conversations WHERE id_listing = $this->id_listing AND ( id_quote = '' OR id_quote IS NULL ) AND bln_is_private = 0 ");
        foreach ( $conv as $c )
        {
            $arr[] = Conversations::where('id', $c->id)->first();
        }

        return $arr;
    }
    
    public static function myOutbidQuotes()
    {
        $id = $_SESSION['id'];
        $quotes = DB::select("SELECT * FROM quotes LEFT JOIN listings ON listings.id_listing = quotes.id_listing
        WHERE quotes.id_user = $id AND listings.id_winning_bidder != $id AND listings.expires_on > NOW() ORDER BY listings.expires_on ASC");

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
}
