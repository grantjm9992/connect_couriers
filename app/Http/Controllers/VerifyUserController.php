<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use App\Http\Controllers\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use \App\Verify;
use \App\User;
use \App\Mail\UsernameOveridden;


class VerifyUserController extends Controller
{
    
    public function __construct()
    {
        $this->secure = 1;
        parent::__construct();

    }

    public function setUserAction()
    {
        \UserLogic::updateUserStatus();
    }

    public function defaultAction()
    {
        if ( isset( $_REQUEST['key'] ) && $_REQUEST['key'] != "" && isset( $_REQUEST['secret'] ) && $_REQUEST['secret'] != "" )
        {
            $verify = Verify::where('key', $_REQUEST['key'])
                            ->where('secret', $_REQUEST['secret'])
                            ->first();
            if (!is_object( $verify ) )
            {
                $message = "Nice try";
            }
            else
            {
                if ( (int)$_REQUEST['accept'] === 0 )
                {
                    $user = User::where('str_user', $verify->username )->first();
                    if ( is_object( $user ) ) 
                    {
                        $user->str_user = $this->generateUser();
                        $user->save();
                        $message = "Done!";

                        \Mail::to( $user->str_email )->send( new UsernameOveridden( $user ) );
                    }
                    else
                    {
                        $message = "User not found";
                    }
                }
            }
        }
        else
        {
            $message = "Nice try";
        }

        die( $message );
    }

    protected function generateUser()
    {
        $user = "";
        $length = 10;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        for ($i = 0; $i < $length; $i++) {
            $user .= $characters[rand(0, $charactersLength - 1)];
        }
        return $user;
    }
}
