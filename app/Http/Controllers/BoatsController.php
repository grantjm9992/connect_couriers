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

class BoatsController extends BaseController
{

    public function __construct() {
        $this->secure = 1;
        parent::__construct();
        $this->set_menu = view('js/set_menu');
        $this->title = "Boat Haulage Companies Specialising in Shipping boats and vessels. Courier Quote Compare";
        $this->keywords = "boat, barge, canoe, catamaran, craft, dinghy, gondola, raft, sailboat, schooner, ship, yacht, compare, competitive, courier, quote, quotes, collection, delivery, haulage companies, couriers, a man with a van, cheap, comparison, shiply, nautical, boats, vessel, vessels, barges, canoes, catamrans, crafts, dinghies, gondolas, rafts, sailboats, schooners, ships, yachts";
        $this->description = "Boat Haulage Companies, Compare Competitive Courier Quotes for the Collection and Delivery of boats, sailboats, canoes and ships etc. Haulage companies and couriers quote on your consignments to give a cheap competitive quote.";
    }

    public function defaultAction()
    {
        $categories = Categories::get();
        $this->cont->body = view('home/boats', array(
            'categories' => $categories
        ));
        return $this->RenderView();
    }

}