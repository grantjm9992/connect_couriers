<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use \App\Providers\TranslationProvider;
use Illuminate\Http\Request;

use \App\Categories;
class HaulageController extends Controller
{
    public function __construct() {
        $this->secure = 1;
        parent::__construct();
        $this->set_menu = view('js/scroll_menu');
        $this->title = "Compare Haulage Quotes for Shipping Freight Goods";
        $this->description = "Competitive Comparison Haulage Quotes for the Collection and Delivery of Freight. Haulage companies, couriers and a man with a van will all quote on your consignments to give cheap competitive courier haulage quotes.";
        $this->keywords = "compare, competitive, courier, quote, quotes, collection, haulage companies, couriers, a man with a van, cheap, comparison, haulage, shipment, shipping, transportation, freight, carriage, consignment, merchandise, payload, ship, delivery, shiply";
    }

    public function defaultAction()
    {
        $categories = Categories::get();
        $this->cont->body = view('home/haulage', array(
            'categories' => $categories
        ));
        return $this->RenderView();
    }
}
