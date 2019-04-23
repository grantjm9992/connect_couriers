<?php

namespace App\Classes;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

use \App\User;
use \App\Listings;
use \App\Quotes;

use \Exception;

class ListingsOU extends ClassOU
{


    public function __construct()
    {

    }
    public static function expiredDetail()
    {
        $id = $_REQUEST['id'];
        $listing = Listings::where('id_listing', $id)->first();
        if ( $_SESSION['id'] == $listing->id_user )
        {
            return view('listings/expired_detail', array(
                "data" => $listing
            ));
        }
        else
        {
            return view('error/no_permission');
        }
    }

    public static function paginatedQuotes($id, $status = 1)
    {
        $listing = Listings::where('id_listing', $id)->first();
        $html = "";
        $page = ( isset( $_REQUEST['page'] ) && $_REQUEST['page'] != "" ) ? $_REQUEST['page'] : 1;
        $quotes = Quotes::getForListing($id, $page, $status);
        $disabledUp = ( count( $quotes ) < 20 ) ? "disabled" : "";
        $disabledDown = ( (int)$page === 1 ) ? "disabled" : "";
        foreach ( $quotes as $quote )
        {
            $html .= view('listings/quote_card', array(
                "quote" => $quote
            ));
        }

        return view('comun/pagination', array(
            "disabledup" => $disabledUp,
            "disableddown" => $disabledDown,
            "data" => $html
        ));
    }

    public static function summary(Listings $listing = null )
    {
        $listing = ( is_null( $listing ) ) ? Listings::where('id_listing', base64_decode( $_REQUEST['id'] ) )->first() : $listing;
        $AcceptedQuote = $listing->getAcceptedQuote();
        $Messages = $AcceptedQuote->getMessages( $AcceptedQuote );

        $messages = "";
        if( !is_null ( $Messages ) )
        {
            foreach ( $Messages as $message )
            {
                $messages .= self::addMessage( $message );
            }
        }

        $conversation = view('mylistings/conversation', array(
            "messages" => $messages
        ));

        $url = ( isset( $_SERVER['HTTP_REFERER'] ) && $_SERVER['HTTP_REFERER'] != "" ) ? $_SERVER['HTTP_REFERER'] : url("MyAccount.myAcceptedQuotes");

        $content = view('mylistings/summary', array(
            "conversation" => $conversation,
            "url" => $url
        ));

        return $content;
    }

    public static function addMessage( $message )
    {
        view('mylistings/message', array(
            "message" => $message,
            "user" => self::getUserById()
        ));
    }
}
