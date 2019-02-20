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
use \App\Categories;
use \App\Vehicles;
use \App\TimeScales;
use \App\Quotes;
use \App\Listings;

use \App\Classes\QuotesOU;

class QuoteController extends BaseController
{

    public function __construct() {
        parent::__construct();
    }

    public function newAction()
    {
        $this->secure = 1;

        $tipo = "";
        if ( isset ( $_REQUEST['tipo'] ) && $_REQUEST['tipo'] != "" )
        {
            $tipo = $_REQUEST['tipo'];
        }

        $categories = Categories::get();
        $this->cont->body = view('quote/new', array(
            'tipo' => $tipo,
            "categories" => $categories
        ));

        return $this->RenderView();

    }

    public function addAction()
    {
        $this->checkMessage($_REQUEST['str_description']);
        if ( isset( $_SESSION['id'] ) )
        {
            Quotes::addQuote();
        }
        return \Redirect::to($_REQUEST['url']);
    }

    public function addModalAction()
    {
        $id = $_REQUEST['id'];
        $url = $_SERVER['HTTP_REFERER'];

        $timescales = TimeScales::get();
        $vehicles = Vehicles::get();

        return view('quote/add_modal', array(
            'id_listing' => $id,
            "url" => $url,
            "timescales" => $timescales,
            "vehicles" => $vehicles
        ));
    }

    public function declineQuoteAction()
    {
        $id_quote = $_REQUEST['id_quote'];
        $id_listing = base64_decode( $_REQUEST['id_listing'] );
        $quote = Quotes::where('id_listing', $id_listing)->where('id_quote', $id_quote)->first();
        if ( is_object( $quote) )
        {
            $quote->id_status = 3;
            $quote->save();
        }
        else
        {
            return json_encode(
                array(
                    "success" => 0,
                    "message" => "Not found"
                )
            );
        }
        return json_encode(
            array(
                "success" => 1,
                "response" => "OK"
            )
        );
    }

    public function processAction()
    {
        $id_quote = base64_decode( $_REQUEST['quote'] );
        $quote = Quotes::where('id_quote', $id_quote)->first();
        $listing = Listings::where('id_listing', $quote->id_listing)->first();
        if ( (int)$listing->id_user === (int)$_SESSION['id'] )
        {
            $this->cont->body = QuotesOU::process( $quote );
            return $this->RenderView();
        }
        else
        {
            return "NO PERSMISSIONS";
        }
    }

}