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

class VehiclePartsController extends BaseController
{

    public function __construct() {
        $this->secure = 1;
        parent::__construct();
        $this->title = "Courier Quote Compare Site for Car and Vehicle Automotive Parts";
        $this->keywords = "Tyres, 4x4 tires, Rims, Alloys, Car Body Parts, Bumpers, Bonnets, Car Doors, Exhausts, Manifolds, Turbos, Differentials, transfer cases, Interior Trim, Radiators, Roof Bars, Motorbike and Child Seats, Headlights, Driveshafts, Tow Bars, Shock absorbers, suspension springs, Leaf spring suspension, Steering rack, Parcel shelf, Prop shaft, Bull bars, Gearbox, Brake discs/Hubs, Axles, engines, automotive parts";
        $this->description = "Courier Compare Quote Site for Car, Vehicle and all Automotive Parts";
        $this->set_menu = view('js/scroll_menu');
    }

    public function defaultAction()
    {
        $categories = Categories::get();
        $this->cont->body = view('home/vehicleparts', array(
            'categories' => $categories,
            "image" => url('archivos/img/vehicle-parts-delivery.jpg')
        ));
        return $this->RenderView();
    }

}