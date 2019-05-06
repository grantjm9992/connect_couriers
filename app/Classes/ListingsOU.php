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

        $allMessages = \App\Messages::getAllForSummary( $AcceptedQuote );
        $conversation = view("mylistings/summary_card", array(
            "listing" => $listing
        ));
        foreach ( $allMessages as $row )
        {
            $conversation .= view("mylistings/message", array(
                "user" => self::getUserById(),
                "message" => $row
            ));
        }

        $url = ( isset( $_SERVER['HTTP_REFERER'] ) && $_SERVER['HTTP_REFERER'] != "" ) ? $_SERVER['HTTP_REFERER'] : url("MyAccount.myAcceptedQuotes");

        $content = view('mylistings/summary', array(
            "listing" => $listing,
            "accepted_quote" => $AcceptedQuote,
            "conversation" => $conversation,
            "url" => $url
        ));

        return $content;
    }

    public static function getExtraItemForm( $item )
    {
        return view('mylistings/extra_item_form', array(
            "item" => $item
        ));
    }

    public static function addMessage( $message )
    {
        view('mylistings/message', array(
            "message" => $message,
            "user" => self::getUserById()
        ));
    }

    public static function uploadImage()
    {
        if (!empty($_FILES)) {
            
            $tempFile = $_FILES['file']['tmp_name'];
            
            $img = new \App\ImagesListings;
            $img->id_listing = $_REQUEST['id'];
            $img->save();

            $targetDir = "data/listings/$img->id_listing/img/";
            if (!is_dir( $targetDir ) )
            {
                mkdir( $targetDir, 0777, true );
            }
            $path = $_FILES['file']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            
            $targetFile = "$targetDir.$img->id.".$ext;
            $img->file_name = $targetFile;
            $img->save();
            move_uploaded_file($tempFile , $targetFile);
        }
    }

    public static function removeImage()
    {
        $image = \App\ImagesListings::where('id', $_REQUEST['id'])->first();
        if ( file_exists($image->file_name ) ) unlink ( $image->file_name );
        $image->delete();
        return "OK";
    }
}
