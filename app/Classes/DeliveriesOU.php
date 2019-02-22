<?php

namespace App\Classes;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

use \App\User;
use \App\Listings;
use \App\Quotes;

use \Exception;

class DeliveriesOU
{
    private $listing;

    public function __construct()
    {
        if ( isset ( $_REQUEST['id'] ) && $_REQUEST['id'] != "" )
        {
            
            $id = $_REQUEST['id'];
            $this->listing = Listings::where('id', $id)->first();
        }
    }

    public static function getQuoteSection( )
    {
        $response = "";
        $id = $_REQUEST['id'];
        $listing = Listings::where('id_listing', $id)->first();
        $quotes = $listing->getQuotes();
        foreach ( $quotes as $quote )
        {
            $messages = ( Quotes::getMessages($quote) !== null ) ? DeliveriesOU::makeConversation( Quotes::getMessages($quote), $listing ) : "";
            $response .= view('deliveries/quote_section_card', array(
                "quote" => $quote,
                "messages" => $messages
            ));
        }

        return view('deliveries/quote_section', array(
            "quotes" => $response
        ));
    }

    public static function getMessageSection( )
    {
        $response = "";
        $id = $_REQUEST['id'];
        $listing = Listings::where('id_listing', $id)->first();
        $conversations = $listing->getConversations();
        $msg = "";
        foreach ( $conversations as $convo )
        {
            $messages = $convo->getMessages();
            $msgs = ( count( $messages ) > 0 ) ? DeliveriesOU::makeConversation( $messages, $listing ) : "" ;
            $msg .= view('deliveries/message_section_card', array(
                "messages" => $msgs
            ));
        }
        $response = view('deliveries/message_section', array(
            "messages" => $msg
        ));
        return $response;
    }

    protected static function makeConversation( $messages, $listing )
    {
        $response = "";
        foreach ( $messages as $message )
        {
            $class = ( (int)$message->id_sender === (int)$listing->id_user ) ? "msg-reply" : "msg-initial";
            $response .= view('messages/message_block', array(
                "message" => $message,
                "class" => $class
            ));
        }
        return $response;
    }
}
