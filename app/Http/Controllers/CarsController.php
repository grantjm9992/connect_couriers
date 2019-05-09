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

class CarsController extends BaseController
{

    public function __construct() {
        $this->secure = 1;
        parent::__construct();
        $this->set_menu = view('js/set_menu');
        $this->keywords = "vehicle transporter, low loader, courier, quote compare, delivery service, cars, car, atv, atvs, quad, quads, van, vans, suv, suvs, rv, rvs, motorbike, motorbikes, motorcycle, motorcycles, quad bike, quad bikes, van, vans, truck, trucks, tractor, tractors, moped, mopeds, boat, boats, scooter, scooters, bus, busses, plane, planes, helicopter, helicopters, ride on lawnmower, ride on lawnmowers, digger, diggers, car transporter, car transporters, camper van, camper vans";
        $this->title = "Vehicle Transporter Courier Quote Compare Site.";
        $this->description = "Vehicle Transporter Courier Comparison Quote Site for all Cars and Vehicles";
    }

    public function defaultAction()
    {
        $categories = Categories::get();
        $this->cont->body = view('home/cars', array(
            'categories' => $categories,
            "image" => url('archivos/img/cars-delivery.jpg')
        ));
        return $this->RenderView();
    }

}