<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use \App\Providers\TranslationProvider;
use Illuminate\Http\Request;

use \App\Categories;

class PetsAndLivestockController extends Controller
{
    public function __construct() {
        $this->secure = 1;
        parent::__construct();
        $this->set_menu = view('js/set_menu');
        $this->title = "Courier Comparison Quotes for Pets, Livestock and Equestrian.";
        $this->keywords = "compare competitive, courier quote, quotes, collection, delivery, animal, animals, alive animal, alive animals, haulage companies, couriers, a man with a van, cheap, comparison, Cats, Dogs, Rabbits, Fish, Small mammals, Birds, Reptiles, Amphibians, Horses, Equine, Cat, Dog, Rabbit, Fish, Small mammal, Bird, Reptile, Amphibian, Horse, Chickens, Cows, Donkeys, Ducks, Ferrets, Goats, Hamsters, Lizards, Pigs and Hogs, Ponies, Pig, Sheep and Snakes";
        $this->description = "Courier Comparison Quotes for the Collection, Delivery and the Transportation of Livestock, Pets and Equestrian etc. Specialised Couriers and Haulage companies and a man with a van will all be quoting to give a cheap competitive comparison quote.";
    }

    public function defaultAction()
    {
        $categories = Categories::get();
        $this->cont->body = view('home/petsandlivestock', array(
            'categories' => $categories,
            "image" => url('archivos/img/pets-and-livestock-transport.jpg')
        ));
        return $this->RenderView();
    }
}
