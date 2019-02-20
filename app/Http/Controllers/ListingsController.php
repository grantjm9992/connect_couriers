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
use \App\Listings;

use App\Classes\ListingsOU;

class ListingsController extends BaseController
{

    public function __construct() {
        $this->secure = 1;
        parent::__construct();
    }

    public function newAction()
    {

        $tipo = "";
        if ( isset ( $_REQUEST['id_category'] ) && $_REQUEST['id_category'] != "" )
        {
            $tipo = $_REQUEST['id_category'];
        }
        $email = "";
        if ( !isset ( $_SESSION['id'] ) )
        {
            $email = view('listings/email_input');
        }

        $categories = Categories::get();
        $this->cont->body = view('listings/new', array(
            'email' => $email,
            'tipo' => $tipo,
            "categories" => $categories
        ));

        return $this->RenderView();

    }

    public function addAction()
    {
        $this->secure = 1;
        if ( isset( $_SESSION['id'] ) )
        {
            Listings::addListing();
        }
        else
        {
            Listings::addUserFirst();
        }
        return \Redirect::to('MyAccount');
    }

    public function expiredDetailAction()
    {
        $this->cont->body = ListingsOU::expiredDetail();
        return $this->RenderView();
    }

}