<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use \App\Providers\TranslationProvider;
use Illuminate\Http\Request;

use \App\Categories;
class OtherItemsController extends Controller
{
    public function __construct() {
        $this->secure = 1;
        parent::__construct();
        $this->set_menu = view('js/set_menu');
        $this->keywords = "other, unusual load, courier, quote compare, delivery service, cold storage transportation, aircraft, trees, abnormal load, wide load, tractor tyres, plant machinery, trains, truck, power plant, wind turbine, cold courier, refrigerated transport, strange load, specialised couriers, specialist transportation";
        $this->description = "Abnormal Load And Specialised Courier Comparison Quote Site, All Your Courier Services For any Parcel, Freight, Goods, General goods and Vehicles etc.";
        $this->title = "Abnormal Load And Specialised Courier Quote compare Site for parcels, freight, vehicles and specialised general goods";
        
    }

    public function defaultAction()
    {
        $categories = Categories::get();
        $this->cont->body = view('home/otheritems', array(
            'categories' => $categories
        ));
        return $this->RenderView();
    }
}
