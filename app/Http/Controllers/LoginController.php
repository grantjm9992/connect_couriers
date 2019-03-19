<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use \App\Providers\TranslationProvider;
use Illuminate\Http\Request;
use \App\User;
use \App\LoginsFallidos;
use \App\Empresas;
use \App\LogSesiones;
use \App\Couriers;

class LoginController extends BaseController
{

    public function __construct() {
        $this->secure = 1;
        parent::__construct();
    }

    public function defaultAction() {
        $idioma = "es";
        if ( isset($_COOKIE['avanzo_author_locale']) && $_COOKIE['avanzo_author_locale'] != "" ) {
            $idioma = $_COOKIE['avanzo_author_locale'];
        }
        $translate = new TranslationProvider;
        $error = "";
        if ( isset($_REQUEST['error']) && $_REQUEST['error'] != "" ) {
            $error = '<div class="alert alert-warning">'.$_REQUEST['error'].'</div>';
        }
        $this->cont->body = view('login', array(
            'idioma' => $idioma,
            'error' => $error,
            'usuario' => $translate->get('login'),
            'contr' => $translate->get('password'),
            'entrar' => $translate->get('entrar'),
            'forgot_password' => $translate->get('forgotten_password')
        ));
        return $this->RenderView();
    }

    public function checkLoginAction() {

        $user = User::where('str_user', $_REQUEST['login'])
                    ->where('str_password', md5( $_REQUEST['password']) )
                    ->first();
        if (is_object( $user )) {
            $_SESSION['user'] = rtrim($user->str_name).' '.rtrim($user->str_surname);
            $_SESSION['id'] = $user->id;
            $_SESSION['id_user_type'] = $user->id_user_type;
            return \Redirect::to('MyAccount'); 
        }
        else
        {
            $user = User::where('str_user', $_REQUEST['login'])->first();
            if ( is_object($user) ) {
                $message = $this->translator->get('wrong_password');
            } else {
                $message = $this->translator->get('user_not_found');
            }
            return \Redirect::to('Login?error='.$message);
        }
    }

    public function logoutAction() {
        /*$date = new \DateTime();
        $sesion = LogSesiones::where('id', $_SESSION['id_sesion'])->first();
        $sesion->fecha_fin = $date->format('Y-m-d H:i:s');
        $sesion->save();*/
        session_destroy();
        return \Redirect::to('/'); 
        
    }

    public function signUpCourierAction()
    {
        if ( isset ( $_SESSION['id'] ) )
        {
            return \Redirect::to('MyAccount');
        }        
        $this->cont->body = view('login/signup_courier');
        return $this->RenderView();
    }

    public function checkCourierAction()
    {
        $user = User::where('str_email', $_REQUEST['str_email'])->first();
        if ( is_object( $user ) )
        {
            $_SESSION['errors'] = $this->translator->get("user_already_exists")."@#";
            return \Redirect::to('Login');
        }
        $date = new \DateTime();
        $new_user = new User;
        $new_user->str_name = $_REQUEST['str_name'];
        $new_user->str_surname = $_REQUEST['str_surname'];
        $new_user->str_email = $_REQUEST['str_email'];
        $new_user->str_password = md5($_REQUEST['str_password']);
        $new_user->date_created = $date->format('Y-m-d H:i:s');
        $new_user->date_last_access = $date->format('Y-m-d H:i:s');
        $new_user->str_user = $this->createUsername();
        $new_user->id_user_type = 2;
        $new_user->save();

        $courier = new Couriers;
        $courier->id_user = $new_user->id_user;
        $courier->save();

        $_SESSION['id'] = $new_user->id;
        $_SESSION['id_user_type'] = $new_user->id_user_type;

        return \Redirect::to('MyAccount');
    }

    protected function createUsername($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function loginModalAction()
    {
        return view('modals/login');
    }
}