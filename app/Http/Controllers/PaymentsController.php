<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Quotes;
use App\Listings;
use App\Users;
use App\Notifications;

use App\PriceCalculator;

/* LOAD PayPal modules */
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Api\Item;
use PayPal\Api\ItemList;


use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Orders\OrdersGetRequest;


class PaymentsController extends Controller
{
    public function __construct()
    {
        parent::__construct();
            /** PayPal api context **/
            $paypal_conf = \Config::get('paypal');
            $this->_api_context = new ApiContext(new OAuthTokenCredential(
                $paypal_conf['client_id'],
                $paypal_conf['secret'])
            );
            $this->_api_context->setConfig($paypal_conf['settings']);
    }

    public function defaultAction()
    {
        $id_quote = base64_decode( $_REQUEST['quote'] );
        $quote = Quotes::where('id_quote', $id_quote)->first();
        $quote->courier = $quote->getCourier();
        $prices = new PriceCalculator( $quote->amount_current );
        $quote->comission = $prices->comission;
        $this->cont->body = view('payments/stripe', array(
            "quote" => $quote
        ));
        return $this->RenderView();
    }

    public function comprobarResponseAction()
    {
        /*$orderID = $_REQUEST['orderID'];
        $client = PayPalHttpClient::client();
        $response = $client->execute(new OrdersGetRequest($orderId));

        $response->result->purchase_units[0]->amount->value

        */
        
        $id_listing = base64_decode( $_REQUEST['id_listing'] );
        $listing = Listings::where('id_listing', $id_listing )->first();
        $listing->id_status = 2;
        $listing->save();

        
        $id_quote = base64_decode( $_REQUEST['id_quote'] );
        $quote = Quotes::where('id_quote', $id_quote )->first();
        $quote->id_status = 2;
        $quote->save();

        $notification = new Notifications;
        $notification->id_user = $_SESSION['id'];
        $notification->str_message = "Quote accepted successfully";
        $notification->bln_notified = 0;
        $notification->save();
        return json_encode(
            array(
                "success" => 1,
                "url" => url("MyAccount.myAcceptedQuotes")
            )
        );
    }

    public function payWithpaypalAction()
    {
        $payer = new Payer();
                $payer->setPaymentMethod('card');
        $item_1 = new Item();
        $item_1->setName('Item 1') /** item name **/
                    ->setCurrency('USD')
                    ->setQuantity(1)
                    ->setPrice($_REQUEST['amount']); /** unit price **/
        $item_list = new ItemList();
                $item_list->setItems(array($item_1));
        $amount = new Amount();
                $amount->setCurrency('USD')
                    ->setTotal($_REQUEST['amount']);
        $transaction = new Transaction();
                $transaction->setAmount($amount)
                    ->setItemList($item_list)
                    ->setDescription('Your transaction description');
        $redirect_urls = new RedirectUrls();
                $redirect_urls->setReturnUrl(url("Payments.getPaymentStatus?status=fail")) /** Specify return URL **/
                    ->setCancelUrl(url("Payments.getPaymentStatus?status=fail"));
        $payment = new Payment();
                $payment->setIntent('Sale')
                    ->setPayer($payer)
                    ->setRedirectUrls($redirect_urls)
                    ->setTransactions(array($transaction));
                /** dd($payment->create($this->_api_context));exit; **/
                try {
        $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
        if (\Config::get('app.debug')) {
        \Session::put('error', 'Connection timeout');
                        return\Redirect::route('paywithpaypal');
        } else {
        \Session::put('error', 'Some error occur, sorry for inconvenient');
                        return\Redirect::route('paywithpaypal');
        }
        }
        foreach ($payment->getLinks() as $link) {
        if ($link->getRel() == 'approval_url') {
        $redirect_url = $link->getHref();
                        break;
        }
        }
        /** add payment ID to \Session **/
                \Session::put('paypal_payment_id', $payment->getId());
        if (isset($redirect_url)) {
        /** redirect to paypal **/
                    return\Redirect::away($redirect_url);
        }
        \Session::put('error', 'Unknown error occurred');
                return\Redirect::route('paywithpaypal');
    }

    public function getPaymentStatusAction()
    {
                /** Get the payment ID before \Session clear **/
                $payment_id = \Session::get('paypal_payment_id');
        /** clear the \Session payment ID **/
                \Session::forget('paypal_payment_id');
                if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
        \Session::put('error', 'Payment failed');
                    return\Redirect::route('/');
        }
        $payment = Payment::get($payment_id, $this->_api_context);
                $execution = new PaymentExecution();
                $execution->setPayerId(Input::get('PayerID'));
        /**Execute the payment **/
                $result = $payment->execute($execution, $this->_api_context);
        if ($result->getState() == 'approved') {
        \Session::put('success', 'Payment success');
                    return\Redirect::route('Payments.response');
        }
        \Session::put('error', 'Payment failed');
                return\Redirect::route('Payments.response');
    }

    public function responseAction()
    {
        $this->cont->body = view('payments/response');
    }
}