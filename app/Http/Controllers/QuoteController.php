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

}