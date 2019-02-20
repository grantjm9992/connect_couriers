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
        $this->paypalConfig =  [
            'client_id' => 'Aa6LAZcGQEzqMak9LZkwkMN26pCskJAn-4Zbe3aH2315WBOXZJBeAU12zTqCB-koRErtcjvtG3ASk9cj',
            'client_secret' => 'ECK8Qa-ojmCvxaOCfXwSiDgTT4CoSqssMQ3bwo2TYSxfrYZAy2-2r-eMpiel4aq868H2XpbnwZyvdocu',
            'return_url' => url('Paypal.return'),
            'cancel_url' => url('Paypal.cancel')
        ];
        $this->apiContext = $this->getApiContext(
            $this->paypalConfig['client_id'],
            $this->paypalConfig['client_secret'],
            $this->enableSandbox
        );
    }

    public function request()
    {
        if (empty($_REQUEST['item_number'])) {
            throw new Exception('This script should not be called directly, expected post data');
        }
        $payer = new Payer();
        $payer->setPaymentMethod('* credit_card');
        // Set some example data for the payment.
        $currency = 'EUR';
        $amountPayable = 0.10;
        $invoiceNumber = uniqid();
        $amount = new Amount();
        $amount->setCurrency($currency)
            ->setTotal($amountPayable);
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setDescription('Some description about the payment being made')
            ->setInvoiceNumber($invoiceNumber);
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl($this->paypalConfig['return_url'])
            ->setCancelUrl($this->paypalConfig['cancel_url']);
        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions([$transaction])
            ->setRedirectUrls($redirectUrls);
        try {
            $payment->create($this->apiContext);
        } catch (Exception $e) {
            die( $e->getMessage() );
            throw new Exception('Unable to create link for payment');
        }
        die( header('location:' . $payment->getApprovalLink()) );
        exit(1);
    }

    public static function response()
    {
        
        if (empty($_GET['paymentId']) || empty($_GET['PayerID'])) {
            throw new Exception('The response is missing the paymentId and PayerID');
        }
        $paymentId = $_GET['paymentId'];
        $payment = Payment::get($paymentId, $this->apiContext);
        $execution = new PaymentExecution();
        $execution->setPayerId($_GET['PayerID']);
        try {
            // Take the payment
            $payment->execute($execution, $this->apiContext);
            try {
                $payment = Payment::get($paymentId, $this->apiContext);
                $data = [
                    'transaction_id' => $payment->getId(),
                    'payment_amount' => $payment->transactions[0]->amount->total,
                    'payment_status' => $payment->getState(),
                    'invoice_id' => $payment->transactions[0]->invoice_number
                ];
                if (addPayment($data) !== false && $data['payment_status'] === 'approved') {
                    // Payment successfully added, redirect to the payment complete page.
                    die ( header('location: http://google.com') );
                    exit(1);
                } else {
                    return "FAILED";
                }
            } catch (Exception $e) {
                return  "Failed to retrieve payment from PayPal";
            }
        } catch (Exception $e) {
            return "Failed to take payment";
        }
    }

    function getApiContext($clientId, $clientSecret, $enableSandbox = false)
    {
        $this->apiContext = new ApiContext(
            new OAuthTokenCredential($clientId, $clientSecret)
        );
        $this->apiContext->setConfig([
            'mode' => $this->enableSandbox ? 'sandbox' : 'live'
        ]);
        return $this->apiContext;
    }
}
