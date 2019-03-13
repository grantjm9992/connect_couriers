<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use App\Http\Controllers\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Notifications;

class NotificationsController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function __construct()
    {
        $this->secure = 1;
        parent::__construct();
    }

    public function checkNotificationsAction() {
        if ( isset ( $_SESSION['id'] ) && $_SESSION['id'] != "" )
        {
            $notifications = Notifications::where('id_user', $_SESSION['id'])
                                        ->where('bln_notified', 0)
                                        ->get();
            
            $messages = array();
            foreach ( $notifications as $notification )
            {
                $messages[] = $notification->str_message;
                $notification->bln_notified = 1;
                $notification->delete();
            }

            return
                json_encode(
                    array(
                        "count" => count($notifications),
                        "messages" => $messages
                    )
                );
        }        
    }
}