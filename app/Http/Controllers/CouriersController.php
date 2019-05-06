<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

use \App\Providers\TranslationProvider;
use \App\User;
use \App\Couriers;
use \App\UserFeedback;
use \App\Regions;

use \App\Classes\PermissionLogic;


class CouriersController extends BaseController
{

    public function __construct() {
        $this->secure = 1;
        parent::__construct();
    }

    public function mailAction()
    {
        PermissionLogic::sendSignupCheck("mail_couriers");
    }
    public function defaultAction()
    {
        $id = $_REQUEST['id'];
        $user = User::where('id', $id)->first();
        $courier = $user->getCourierInfo();
        $regionArray = explode('@#', $courier->regions, -1 );
        $regions = "  ";
        foreach ( $regionArray as $region )
        {
            $r = Regions::where('id', $region)->first();
            $regions .= " $r->str_description,";
        }
        $courier->regions = substr($regions, 0, strlen($regions) - 1);
        $feedback = UserFeedback::getProfileArray($id);
        $userStatus = \UserLogic::_getUserStatus( $user );

        $feedback_table = $this->feedbackPaginated();
        // Algo de pagination con eso ^^ //


        foreach ( $courier as $key => $value )
        {
            if ( $value == "" )
            {
                $courier->$key = "Not specified";
            }
        }
        $this->cont->body = view('couriers/publicprofile', array(
            "courier" => $courier,
            "feedback" => $feedback,
            "feedback_table" => $feedback_table,
            "userStatus" => $userStatus
        ));

        return $this->RenderView();
    }

    protected function feedbackPaginated()
    {
        return "";
    }
}
