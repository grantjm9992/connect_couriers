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
use \App\Watching;
use \App\Listings;

class MyAccountController extends BaseController
{

    public function __construct() {
        parent::__construct();
    }

    public function defaultAction() {
        if ( isset( $_SESSION['id_user_type'] ) && $_SESSION['id_user_type'] == "2" )
        {
            list( $active, $outbid, $accepted, $unsuccessful, $completed, $watching ) = Quotes::getMySummary();
            $this->cont->body = view('myaccount/courier_index', array(
                "outbid" => $outbid,
                "active" => $active,
                "accepted" => $accepted,
                "unsuccessful" => $unsuccessful,
                "completed" => $completed,
                "watching" => $watching
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

    public function toggleFavsAction()
    {
        $id_listing = $_REQUEST['id'];
        $watching = Watching::where('id_user', $_SESSION['id'])
                            ->where('id_listing', $id_listing)
                            ->first();
        
        if ( is_object( $watching ) )
        {
            $watching->delete();
        }
        else
        {
            $new = new Watching;
            $new->id_user = $_SESSION['id'];
            $new->id_listing = $id_listing;
            $new->save();
        }
        return json_encode(
            array(
                "success" => 1
            )
        );
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

    public function detailAction()
    {
        $user = User::where('id', $_SESSION['id'])->first();

        if ( (int)$_SESSION['id_user_type'] === 1 )
        {
            $this->cont->body = view('myaccount/perfil', array(
                "user" => $user
            ));
        }
        else
        {
            $courier = $user->getCourierInfo();
            $this->cont->body = view('myaccount/courier_perfil', array(
                "courier" => $courier
            ));
        }

        return $this->RenderView();
    }

    public function editAction()
    {
        $user = User::where('id', $_SESSION['id'])->first();
        $user->str_name = $_REQUEST['str_name'];
        $user->str_surname = $_REQUEST['str_surname'];
        $user->str_email = $_REQUEST['str_email'];
        $user->num_phone = $_REQUEST['num_phone'];
        if ( isset( $_REQUEST['str_password'] ) && $_REQUEST['str_password'] != "" ) $user->str_password = md5( $_REQUEST['str_password'] );
        $user->save();
        return \Redirect::to(url('MyAccount'));
    }

}