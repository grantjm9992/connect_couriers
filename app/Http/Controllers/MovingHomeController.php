<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use \App\Providers\TranslationProvider;
use Illuminate\Http\Request;

use \App\Categories;

class MovingHomeController extends Controller
{
    
    public function __construct() {
        $this->secure = 1;
        $this->set_menu = view('js/scroll_menu');
        parent::__construct();
        $this->title = "Courier Quote Comparisons for moving home or relocating.";
        $this->keywords = " home removal, compare, competitive, courier, quote, quotes, collection, delivery, furniture, white goods, haulage companies, couriers, a man with a van, cheap, comparison, moving home, relocating, emigrating, expat, moving furniture, home removals, house move, house moving";
        $this->description = "Comparing competitive Courier Quotes for Collection and Delivery for people moving home, relocating, emigrating or just for home furniture removals. We will get you the cheapest competitive comparison quotes.";
    }

    public function defaultAction()
    {
        $categories = Categories::get();
        $this->cont->body = view('home/movinghome', array(
            'categories' => $categories,
            "image" => url('archivos/img/moving-home-quotes.jpg')
        ));
        return $this->RenderView();
    }
}
