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

use \App\Classes\QuotesOU;

class MyQuotesController extends BaseController
{

    public function __construct() {
        parent::__construct();
    }

    protected function getListingCards()
    {
        $data = Listings::myListingCards();
        $html = "";
        foreach($data as $row)
        {
            $html .= view('comun/listing_card', array(
                'listing' => $row
            ));
        }
        return $html;
    }

    public function myActiveQuotesAction()
    {

        $title = "My active quotes";
        $iconClass = "fa-box-open dark-gray";
        $data = Quotes::myActiveQuotes();
        $grid = $this->specialGrid($data, 'myquotes/active_grid');
        
        $this->cont->body = view('myquotes/list_page', array(
            "title" => $title,
            "iconClass" => $iconClass,
            "list" => $grid
        ));
        return $this->RenderView();
    }

    public function myAcceptedQuotesAction()
    {
        $title = "My accepted quotes";
        $iconClass = "fa-check-circle blue";
        $accepted = Quotes::myAcceptedQuotes();
        $acc_list = view('myaccount/acc_grid', array(
            'data' => $accepted
        ));
        $this->cont->body = view('myquotes/list_page', array(
            "title" => $title,
            "iconClass" => $iconClass,
            "list" => $acc_list
        ));

        return $this->RenderView();
    }

    public function myOutbidQuotesAction()
    {
        $quotes = Listings::myOutbidQuotes();
        $grid = view('myquotes/outbid_grid', array(
            "data" => $quotes
        ));
        $title = "Outbid quotes";
        $iconClass = "fa-thumbs-down text-warning";
        $this->cont->body = view('myquotes/list_page', array(
            "title" => $title,
            "iconClass" => $iconClass,
            "list" => $grid
        ));
        return $this->RenderView();
    }

    public function myUnsuccessfulQuotesAction()
    {
        $arr = array();
        $quotes = Quotes::myUnsuccessfulQuotes();
        foreach ( $quotes as $quote )
        {
            $listing = Listings::where('id_listing', $quote->id_listing)->first();
            $listing->amount_current = $quote->amount_current;
            $arr[] = $listing;
        }
        $grid = view('myquotes/unsucc_grid', array(
            "data" => $arr
        ));
        $title = "Unsuccessful quotes";
        $iconClass = "fa-times-circle red";
        $this->cont->body = view('myquotes/list_page', array(
            "title" => $title,
            "iconClass" => $iconClass,
            "list" => $grid
        ));
        return $this->RenderView();
    }
    
    public function myCompletedQuotesAction()
    {
        $arr = array();
        $quotes = Quotes::myCompletedQuotes();
        foreach ( $quotes as $quote )
        {
            $listing = Listings::where('id_listing', $id_listing)->first();
            $arr[] = $listing;
        }
        $grid = view('myquotes/succ_grid', array(
            "data" => $arr
        ));
        $title = "Completed quotes";
        $iconClass = "fa-handshake green";
        $this->cont->body = view('myquotes/list_page', array(
            "title" => $title,
            "iconClass" => $iconClass,
            "list" => $grid
        ));
        return $this->RenderView();
    }
    
    public function getListingCardsAction()
    {
        $data = DB::select('SELECT *, listing_status.description AS status FROM listings LEFT JOIN listing_status ON listing_status.id = listings.id_status WHERE id_user = '.$_SESSION['id'].' AND id_status = 1');
        $html = "<table id='results' style='width: 100%;'><thead><tr style='display: none;'><th></th></tr></thead><tbody>";
        foreach($data as $row)
        {
            $html .= '<tr><td>'.view('comun/listing_card_search', array(
                'listing' => $row
            )).'</td></tr>';
        }
        $html .= '</tbody></table>';
        return $html;
    }

    public function ignoreQuoteAction()
    {
        $id_quote = $_REQUEST['id_quote'];
        $quote = Quotes::where('id_quote', $id_quote)->first();
        if ( (int)$quote->id_user === (int)$_SESSION['id'] )
        {
            $quote->bln_ignore = 1;
            $quote->save();
            return "OK";
        }
    }
    
    public function updateQuoteAction()
    {
        $id_quote = $_REQUEST['id_quote'];
        $id_listing = $_REQUEST['id_listing'];

        $listing = Listings::where('id_listing', $id_listing)->first();

        $quote = Quotes::where('id_quote', $id_quote)->first();
        $quote->amount_start = (int)$_REQUEST['new_quote'];
        $quote->amount_min = (int)$_REQUEST['min_quote'];
        $quote->save();

        Quotes::updateQuotesForListing( $listing, $quote );

        return "OK";
    }

    public function withdrawAction()
    {
        return QuotesOU::withdraw();
    }

}