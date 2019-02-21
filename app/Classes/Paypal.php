<?php

namespace App\Classes;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

/* LOAD PayPal modules */
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

use \App\User;

use \Exception;

class Paypal {
    

    private $paypalConfig;
    private $enableSandbox = true;
    private $apiContext;

    public function __construct()
    {
    }

    public function request()
    {
        
    }

    public static function response()
    {
    }

}
