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
        $this->set_menu = view('js/scroll_menu');
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