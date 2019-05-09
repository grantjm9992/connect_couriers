<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use \App\Providers\TranslationProvider;
use Illuminate\Http\Request;

use \App\Categories;

class EbayGoodsController extends BaseController
{

    public function __construct() {
        $this->secure = 1;
        parent::__construct();
        $this->set_menu = view('js/set_menu');
        $this->title = "Compare Courier Quotes for eBay Parcels and Goods";
        $this->keywords = "ebay, ebays, ebay's, compare, competitive, courier, quote, quotes, collection, delivery, ebay goods, ebay delivery, ebay courier, ebay collection, I need something collecting from ebay, ebay pick up, ebay collection";
        $this->description = "Competitively Compare Courier Quotes for the Collection and Delivery of All your eBay Sales, Parcel Dispatch, Goods and General Items.";
    }

    public function defaultAction()
    {
        $categories = Categories::get();
        $this->cont->body = view('home/ebay', array(
            'categories' => $categories
        ));
        return $this->RenderView();
    }

}