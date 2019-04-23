<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Http\Request;

class OopsController extends Controller
{
    public function __construct()
    {
        $this->secure = 1;
        parent::__construct();
    }

    public function defaultAction()
    {
        return view('error/page_not_found');
    }
}
