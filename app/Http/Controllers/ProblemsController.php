<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use \App\Providers\TranslationProvider;
use Illuminate\Http\Request;

use \App\Classes\Paypal;

class ProblemsController extends BaseController
{

    public function __construct() {
        $this->secure = 1;
        parent::__construct();
    }
    
    public function createAction()
    {
        $this->cont->body = view('problems/create');
        return $this->RenderView();
    }

    public function sendAction()
    {
        $problem = \App\Problems::create($_REQUEST);
        \NotificationLogic::sendFoundError($problem);
        return \Redirect::to('/')->send();
    }
}