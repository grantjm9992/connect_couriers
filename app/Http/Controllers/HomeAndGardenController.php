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

class HomeAndGardenController extends BaseController
{

    public function __construct() {
        $this->secure = 1;
        parent::__construct();
        $this->set_menu = view('js/set_menu');
        $this->title = "Courier Quote compare Site for parcels, freight, vehicles and general goods";
        $this->description = "Courier Comparison Quote Site To Obtain The Best And Cheapest Price For All Your Courier Services. For any parcel, freight, goods, general goods and vehicles";
        $this->keywords = "courier, quote compare, delivery service, FURNITURE, MOTORBIKES, PUSHBIKES, GOKARTS, RIDEONS, CARS, BAY GOODS, FRAGILE ITEMS, BOATS, REMOVALS, GENERAL ITEMS, BOXES, OTHER VEHICLES, VEHICLE PARTS, MOVING HOME, HAULAGE, PALLETS, PIANOS, PETS & LIVESTOCK, WHITE GOODS, GARDEN EQUIPMENT, KITCHENS, BATHROOMS, FOOD , OFFICE FURNITURE, GENERATORS, ENGINES";
    }

    public function defaultAction()
    {
        $categories = Categories::get();
        $this->cont->body = view('home/generalitems', array(
            'categories' => $categories
        ));
        return $this->RenderView();
    }

}