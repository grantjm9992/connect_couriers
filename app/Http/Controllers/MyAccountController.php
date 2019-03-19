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
use \App\Couriers;

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
            $categories = \App\Categories::orderBy('str_category', 'ASC')->get();
            $paymentMethods = \App\TypesPayment::orderBy('str_description', 'ASC')->get();
            $regions = \App\Regions::orderBy('str_description', 'ASC')->get();
            $courierTypes = \App\TypesCourier::orderBy('str_description', 'ASC')->get();
            $companyTypes = \App\TypesCompany::orderBy('str_description', 'ASC')->get();
            $courier = $user->getCourierInfo();
            $onLoadJS = $this->getCourierJS($courier);
            $this->cont->body = view('myaccount/courier_perfil', array(
                "courier" => $courier,
                "categories" => $categories,
                "paymentMethods" => $paymentMethods,
                "regions" => $regions,
                "courierTypes" => $courierTypes,
                "companyTypes" => $companyTypes,
                "onLoadJS" => $onLoadJS
            ));
        }

        return $this->RenderView();
    }

    protected function getCourierJS($courier)
    {
        $regionArray = explode('@#', $courier->regions, -1);
        $categoryArray = explode('@#', $courier->categories, -1);
        $paymentTypeArray = explode('@#', $courier->payment_types, -1);
        $js = "";
        foreach ( $regionArray as $region )
        {
            $js .= "$('#region_$region').click();";
        }
        foreach ( $paymentTypeArray as $pm )
        {
            $js .= "$('#pm_$pm').click();";
        }
        foreach ( $categoryArray as $category )
        {
            $js .= "$('#category_$category').click();";
        }
        if ( (int)$courier->bln_git === 1 )
        {
            $js .= "$('#git_check').click();$('.git-check').show(500);";
        }
        if ( (int)$courier->bln_cmr === 1 )
        {
            $js .= "$('#cmr_check').click();$('.cmr-check').show(500);";
        }
        if ( (int)$courier->bln_other === 1 )
        {
            $js .= "$('#other_check').click();$('.other-check').show(500);";
        }

        return $js;
    }

    public function editAction( $stay = null )
    {
        $user = User::where('id', $_SESSION['id'])->first();
        $user->str_name = $_REQUEST['str_name'];
        $user->str_surname = $_REQUEST['str_surname'];
        $user->str_email = $_REQUEST['str_email'];
        $user->num_phone = $_REQUEST['num_phone'];
        if ( isset( $_REQUEST['str_password'] ) && $_REQUEST['str_password'] != "" ) $user->str_password = md5( $_REQUEST['str_password'] );
        $user->save();
        if ( $stay === null )
        {
            return \Redirect::to(url('MyAccount'));
        }
        else
        {
            return "OK";
        }
    }

    public function editCourierAction()
    {
        $this->editAction();
        $request = array_filter($_REQUEST, 'strlen');
        $courier = Couriers::where('id_user', $_SESSION['id'])->first()->update($request);
        /*foreach ( $_REQUEST as $key => $value )
        {            
            if ( array_key_exists( $key, $courier ) === true )
            {
                die ( $key );
                $courier->$key = $value;
            }
        }
        $courier->save();*/

        return \Redirect::to(url('MyAccount'));

    }

}