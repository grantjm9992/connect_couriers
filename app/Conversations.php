<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Conversations extends Model
{
    protected $table = "conversations";

    public function getMessages()
    {
        $id = $this->id;
        return DB::select("SELECT *, CONCAT(users.str_name, ' ', users.str_surname) AS sender
                FROM messages_sent
                LEFT JOIN users ON users.id = messages_sent.id_sender
                WHERE messages_sent.id_conversation = $id  ORDER BY date_sent ASC");
    }
}
