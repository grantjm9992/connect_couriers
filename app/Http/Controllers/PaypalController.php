<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use \App\Providers\TranslationProvider;
use Illuminate\Http\Request;

use \App\Classes\Paypal;

class PaypalController extends BaseController
{

    public function __construct() {
        parent::__construct();
    }
    
    public function returnAction()
    {

    }

    public function cancelAction()
    {

    }

    public function requestAction()
    {
        $PayPal = new Paypal();
        $PayPal->request();
    }

    public function responseAction()
    {

    }

}