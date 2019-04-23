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

class MotorcyclesController extends BaseController
{

    public function __construct() {
        $this->secure = 1;
        parent::__construct();
        $this->title = "Courier Quote compare Site for Motorbikes and Motorcycle transportation";
        $this->description = "Courier Comparison Quote Site for Motorbikes and Motorcycle transportation, also general goods and vehicle shipping";
        $this->keywords = "courier quote compare, delivery, transportation service, motorbike, motor bike, motor-bike, motorcycle, motor cycle, motor-cycle, chopper, hog, minibike, moped, scooter, dirt bike, Aprilia, BMW, Buell, Can-Am, Ducati, Harley-Davidson, Honda, Kawasaki, KTM, Kymco, Moto Guzzi, Suzuki, Triumph, Victory, Yamaha";
    }

    public function defaultAction()
    {
        $categories = Categories::get();
        $this->cont->body = view('home/motorcycles', array(
            'categories' => $categories,
            "image" => url('archivos/img/cars-delivery.jpg')
        ));
        return $this->RenderView();
    }

}