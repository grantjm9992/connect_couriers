<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Messages extends Model
{
    protected $table = "messages";
    public static function getForListing( $id = null )
    {
        if ( $id === null )
        {
            $id = $_REQUEST['id'];
        }
        $msgs = DB::select('SELECT *, messages.id FROM messages
                            LEFT JOIN users ON users.id = messages.id_sender
                            WHERE (id_reply_to = 0 OR id_reply_to IS NULL) AND id_listing = '.$id);

        return $msgs;
    }

    public static function getReply( $id )
    {
        $msgs = DB::select('SELECT * FROM messages
                            LEFT JOIN users ON users.id = messages.id_sender
                            WHERE id_reply_to = '.$id);
        if ( count( $msgs) > 0 )
        {
            return $msgs[0];
        }
        else
        {
            return "";
        }
    }

    public static function getFromId($id)
    {
        $message = DB::select('SELECT *, listings.str_title AS listing, messages.id FROM messages
                                LEFT JOIN users ON users.id = messages.id_sender
                                LEFT JOIN listings ON listings.id_listing = messages.id_listing
                                WHERE messages.id = '.$id);

        return $message[0];        
    }
}
