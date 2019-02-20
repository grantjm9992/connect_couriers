<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MesssageQuote extends Model
{
    protected $table = "message_quote";

    public static function getForQuote($id)
    {
        $messages = DB::select('SELECT * FROM message_quote
                                LEFT JOIN users ON users.id = message_quote.id_user
                                WHERE id_quote = '.$id);

        return $messages;
    }
}
