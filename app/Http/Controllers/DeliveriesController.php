<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use \App\Providers\TranslationProvider;
use Illuminate\Http\Request;
use \App\User;
use \App\LogSesiones;
use \App\Listings;
use \App\Quotes;
use \App\Messages;
use \App\Watching;

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
        $object = Listings::where('id_listing', $id)->first();
        if ( !is_object( $object ) ) {$this->cont->body = Controller::doesntExist(); return $this->RenderView();}
        $listing = Listings::getListingDetail($id);
        $buttons = "";
        $quotes = Quotes::getForListing($id, null);
        $msgs = Messages::getForListing($id);

        $titleArray = explode(" ", $listing->str_title);
        if ( \strlen($listing->str_title) > 45 )
        {
            $i = 0;
            foreach ( $titleArray as  $word )
            {
                if ( $i += \strlen( $word ) + 1 < 45 ) $insert .= " $word";
            }
        }
        else
        {
            $insert = $listing->str_title;
        }
        $this->title = "Cheap$insert Delivery";
        $this->keywords = "cheap delivery, cheap courier services, cheap delivery services, delivery, courier services, cheap $listing->str_title delivery ";

        $quote_html = view('comun/nodata');
        $mesages = view('comun/nodata');
        $images = DB::select('SELECT * FROM images_listings WHERE id_listing = '.$id);
        $img = "";
        foreach( $images as $image )
        {
            $url = $image->file_name;
            $img .= "<div class='text-center' style='line-height: 100px; max-height: 200px;'><img style='display: inline-block; max-width: 100%; max-height: 100%;' alt='Cheap $listing->str_title delivery' src='$url'/></div>";
        }

        $quotes = DeliveriesOU::getQuoteSection();
        $messages = DeliveriesOU::getMessageSection();
        $url = ( isset( $_SERVER['HTTP_REFERER'] ) && $_SERVER['HTTP_REFERER'] != "" && !strpos( $_SERVER['HTTP_REFERER'], $_SERVER['REQUEST_URI'] ) ) ? $_SERVER['HTTP_REFERER'] : "Deliveries.search";
        $expires_on = new \DateTime( $listing->expires_on );
        $now = new \DateTime();


        if ( $listing->id_status !== 1 || $now > $expires_on )
        {
            $this->cont->body = view('deliveries/finished', array(
                "data" => $listing,
                "img" => $img,
                "url" => $url
            ));

            return $this->RenderView();
        }

        $listing->is_favourite = 0;
        if ( isset ( $_SESSION['id_user_type'] ) && (int)$_SESSION['id_user_type'] === 2 )
        {
            $fav = Watching::where('id_user', $_SESSION['id'])
                            ->where('id_listing', $id)->first();
            if ( is_object( $fav ) )
            {
                $listing->is_favourite = 1;
            }
        }

        $items = $object->getItems();

        $this->cont->body = view('deliveries/detail', array(
            'data' => $listing,
            'buttons' => $buttons,
            "items" => $items,
            'quotes' => $quotes,
            'messages' => $messages,
            "img" => $img,
            "url" => $url
        ));

        return $this->RenderView();
    }

    public function searchAction()
    {
        $categories = \App\Categories::orderBy('str_category', 'ASC')->get();
        $html = $this->getListingCards();

        $this->cont->body = view('deliveries/search', array(
            'listings' => $html,
            "categories" => $categories
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