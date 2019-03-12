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
        $messages = DB::select("SELECT *, CONCAT(users.str_name, ' ', users.str_surname) AS sender, messages_sent.id
                FROM messages_sent
                LEFT JOIN users ON users.id = messages_sent.id_sender
                WHERE messages_sent.id_conversation = $id  ORDER BY date_sent ASC");
        
        $date = new \DateTime();

        foreach ( $messages as $message )
        {
            $msg = MessagesSent::where('id', $message->id)
                                ->first();
            if ( !$msg->date_read && $msg->id_sender != $_SESSION['id'] )
            {
                $msg->date_read = $date->format('Y-m-d H:i:s');
                $msg->save();
            }
        }

        return $messages;
    }
}
