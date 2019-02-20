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
use \App\Categories;
use \App\Quotes;

use \App\Classes\SecurePage;

class MyListingsController extends BaseController
{

    private $id;

    public function __construct() {
        parent::__construct();
        $this->id = $_REQUEST['id'];
        $listing = Listings::where('id_listing', $this->id)->first();
        $secure = new SecurePage($listing, "id_user");
    }

    public function defaultAction() {
        
    }

    public function detailAction()
    {
        $listing = Listings::where('id_listing', $this->id)->first();
        $categories = Categories::get();

        $this->cont->body = view('mylistings/detail', array(
            'listing' => $listing,
            "categories" => $categories
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

        $quotes = Quotes::getForListing($this->id);

        $html = "";
        foreach ( $quotes as $quote )
        {
            $html .= "<div class='row'><div class='col-8'>$quote->str_user : $quote->num_cantidad $quote->code_currency </div><div class='col-4'><div class='btn btn-success' onclick='acceptQuote($quote->id_quote)'>Accept quote</div></div>";
        }

        $this->cont->body = view('mylistings/quotes_for_listing', array(
            "listing" => $listing
        ));

        return $this->RenderView();
    }
}