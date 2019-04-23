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
use \App\Categories;
use \App\Quotes;

use \App\Classes\ListingsOU;

class MyListingsController extends BaseController
{

    private $id;
    private $listing;

    public function __construct() {
        parent::__construct();
        if ( isset( $_REQUEST['id'] ) && $_REQUEST['id'] != "" )
        {
            $this->id = $_REQUEST['id'];
            $this->listing = Listings::where('id_listing', $this->id)->first();
        }
        if ( (int)$_SESSION['id_user_type'] === 2 ) return \Redirect::to('MyAccount')->send();
    }

    public function defaultAction() {
        
    }

    public function detailAction()
    {
        $url = ( isset ( $_SERVER['HTTP_REFERER'] ) && $_SERVER['HTTP_REFERER'] != "" ) ? $_SERVER['HTTP_REFERER'] : "MyAccount.myActiveListings";
        $listing = Listings::where('id_listing', $this->id)->first();
        $categories = Categories::get();

        $this->cont->body = view('mylistings/detail', array(
            'listing' => $listing,
            "categories" => $categories,
            "returnURL" => $url
        ));

        return $this->RenderView();

    }

    public function relistAction()
    {
        $listing = Listings::cloneFromId($this->id);

        return \Redirect::to("MyListings.detail?id=$listing->id_listing");
    }

    public function saveAction()
    {
        $id = $_REQUEST['id_listing'];
        $listing = Listings::where('id_listing', $id)->first();
        $listing->updateFromForm();

        return \Redirect::to('MyAccount.myActiveListings');
    }

    public function deleteAction()
    {

        $listing = Listings::where('id_listing', $this->id)->first();
        $listing->id_status = "3";
        $listing->save();

        return \Redirect::to('MyAccount');
        //$response = Listings::deleteAllListing();
    }

    public function confirmDeleteAction()
    {
        return view('mylistings/confirm_modal', array(
            'id' => $this->id
        ));
    }

    public function quotesAction()
    {
        $listing = Listings::where('id_listing', $this->id)->first();

        $url = ( isset ( $_SERVER['HTTP_REFERER'] ) && $_SERVER['HTTP_REFERER'] != "" ) ? $_SERVER['HTTP_REFERER'] : "MyListings.myActiveListings";
        $paginated = $this->paginatedQuotesAction();
        $this->cont->body = view('mylistings/quotes_for_listing', array(
            "listing" => $listing,
            "quotes" => $paginated,
            "declined_quotes" => "<div style='margin: 0 auto;' onclick='getDeclinedQuotes()' class='btn btn-info'>Show declined quotes</div>", 
            "url" => $url
        ));
        return $this->RenderView();
    }

    public function declinedQuotesAction()
    {
        $html = ListingsOU::paginatedQuotes($this->id, 3);
        return $html;
    }

    public function paginatedQuotesAction()
    {
        return ListingsOU::paginatedQuotes($this->id);
    }

    public function summaryAction()
    {
        $this->cont->body = ListingsOU::summary();

        return $this->RenderView();
    }
}