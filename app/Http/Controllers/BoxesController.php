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

class BoxesController extends BaseController
{

    public function __construct() {
        $this->secure = 1;
        parent::__construct();
        $this->set_menu = view('js/scroll_menu');
        $this->title = "Courier Comparison Quotes for general boxes and wrapped parcels";
        $this->keywords = "parcel, box, parcels, boxes, compare competitive courier quote, quotes, collection, delivery, haulage companies, couriers, a man with a van, cheap, comparison, large box, large boxes, large parcel, large parcels, pallet, pallets, palletised, wrap, wrapped";
        $this->description = "Competitive Parcel Courier Comparison Quote for the Collections and Deliveries of Wrapped Parcels and Boxes. General and specialised courier services for business and the general public.";
    }

    public function defaultAction()
    {
        $categories = Categories::get();
        $this->cont->body = view('home/boxes', array(
            'categories' => $categories
        ));
        return $this->RenderView();
    }

}