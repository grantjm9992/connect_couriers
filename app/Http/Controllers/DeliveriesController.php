<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use \App\Providers\TranslationProvider;
use Illuminate\Http\Request;
use \App\User;
use \App\LogSesiones;
use \App\Listings;
use \App\Quotes;
use \App\Messages;

use \App\Classes\DeliveriesOU;

class DeliveriesController extends BaseController
{

    public function __construct() {
        $this->secure = 1;
        parent::__construct();
    }

    public function defaultAction() {
        
        return $this->RenderView();
    }

    public function detailAction()
    {
        $id = $_REQUEST['id'];
        $buttons = "";
        $quotes = Quotes::getForListing($id, null);
        $msgs = Messages::getForListing($id);

        $quote_html = view('comun/nodata');
        $mesages = view('comun/nodata');
        $images = DB::select('SELECT * FROM images_listings WHERE id_listing = '.$id);
        $img = "";
        foreach( $images as $image )
        {
            $url = "data/listings/$image->id_listing/$image->file_name";
            $img .= "<div class='col-4' style='line-height: 100px;'><img style='max-width: 100%; max-height: 100%;' src='$url'/></div>";
        }

        $quotes = DeliveriesOU::getQuoteSection();
        $messages = DeliveriesOU::getMessageSection();

        /*
        if ( count( $quotes ) > 0 )
        {
            $quote_html = "";
            foreach( $quotes as $quote )
            {
                $quote_html .= view('comun/quote_row', array(
                    'quote' => $quote
                ));
            }
        }
        if ( count( $msgs ) > 0 )
        {
            $mesages = "";
            foreach( $msgs as $msg )
            {
                $reply = "";
                $reply = Messages::getReply($msg->id);
                $mesages .= view('deliveries/message', array(
                    'message' => $msg,
                    'reply' => $reply
                ));
            }
        }*/

        $listing = Listings::getListingDetail($id);
        if ( !is_object($listing) )
        {
            return \Redirect::to('Deliveries.search');
        }

        $this->cont->body = view('deliveries/detail', array(
            'data' => $listing,
            'buttons' => $buttons,
            'quotes' => $quotes,
            'messages' => $messages,
            "img" => $img
        ));

        return $this->RenderView();
    }

    public function searchAction()
    {
        $html = $this->getListingCards();

        $this->cont->body = view('deliveries/search', array(
            'listings' => $html
        ));

        return $this->RenderView();

    }

    public function testAction()
    {
        $url = 'https://maps.googleapis.com/maps/api/distancematrix/json?origins=OL139NS&destinations=BL99ST&mode=driving&key=AIzaSyA-5_Xlc2AzrqCECR9hGx210eUTCBuOOZI';
        var_dump( json_decode(file_get_contents($url)) );
    }
    
    public function getListingCards()
    {
        $data = Listings::getSearch();
        $html = "<h4> ".count($data)." ".$this->translator->get('results')."</h4><table id='results' style='width: 100%;'><thead><tr style='display: none;'><th></th></tr></thead><tbody>";
        foreach($data as $row)
        {
            if ( strlen($row->str_description) > 60 ) {
                $row->str_description = substr($row->str_description, 0, 57).'...';
            }
            $row->title_url = \str_replace(" ", "-", $row->str_title);
            $html .= '<tr><td>'.view('comun/listing_card_search', array(
                'listing' => $row
            )).'</td></tr>';
        }
        $html .= '</tbody></table>';
        return $html;
    }

    public function getListingCardsAction()
    {
        $html = $this->getListingCards();
        return view('deliveries/returnTable', array(
            "listings" => $html
        ));
    }
}