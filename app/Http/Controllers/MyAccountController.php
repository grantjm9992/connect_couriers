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
use \App\Quotes;
use \App\Listings;

class MyAccountController extends BaseController
{

    public function __construct() {
        parent::__construct();
    }

    public function defaultAction() {
        if ( isset( $_SESSION['id_user_type'] ) && $_SESSION['id_user_type'] == "2" )
        {
            list( $active, $outbid, $accepted, $unsuccessful, $completed ) = Quotes::getMySummary();
            $this->cont->body = view('myaccount/courier_index', array(
                "outbid" => $outbid,
                "active" => $active,
                "accepted" => $accepted,
                "unsuccessful" => $unsuccessful,
                "completed" => $completed
            ));
        }
        else
        {
            $count = Listings::getMyListingsCount();
            $html = $this->getListingCards();
            $this->cont->body = view('myaccount/index', array(
                'listings' => $html,
                'count' => $count
            ));
        }
        return $this->RenderView();
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

    public function myActiveListingsAction()
    {

        $data = Listings::myActiveListings();
        $html = $this->specialGrid($data, 'comun/special_grid');
        
        $this->cont->body = view('myaccount/active_listings', array(
            'listings' => $html
        ));
        return $this->RenderView();
    }

    public function myAcceptedQuotesAction()
    {
        $accepted = Listings::myAcceptedListings();
        $acc_list = view('myaccount/acc_grid', array(
            'data' => $accepted
        ));
        $this->cont->body = view('myaccount/accepted_quotes', array(
            'accepted' => $acc_list
        ));

        return $this->RenderView();
    }

    public function myExpiredListingsAction()
    {
        $expired = Listings::myExpiredListings();

        $expired_list = view('myaccount/expired_grid', array(
            'data' => $expired
        ));
        $this->cont->body = view('myaccount/expired_listings', array(
            'expired' => $expired_list
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

}