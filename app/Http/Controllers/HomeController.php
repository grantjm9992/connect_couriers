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
use \App\Categories;

class HomeController extends BaseController
{

    public function __construct() {
        $this->secure = 1;
        parent::__construct();
        $this->keywords = "cheap courier services, cheap delivery services, cheap couriers, cheap delivery, courier, quote, compare, compare courier quotes, quotes, cheap, services, transportation services, transportation, service, compare delivery quotes, delivery, price, prices, delivery quote compare, cheap delivery prices";
        $this->description = "Cheap courier services and cheap delivery. Delivery price comparison from couriers with transportation service experience.";
        $this->title = "Cheap courier quote compare";
        $this->set_menu = view('js/scroll_menu');
    }
    
    public function defaultAction() {
        $categories = Categories::get();
        $this->cont->body = view('home/index', array(
            'categories' => $categories
        ));
        return $this->RenderView();
    }

    public function checkLoginAction() {

        $user = User::where('login', $_REQUEST['login'])
                    ->where('password', md5($_REQUEST['password']))
                    ->first();
        if (is_object( $user )) {
            $sesion = new LogSesiones;
            setcookie('avanzo_author_locale', $_REQUEST['idioma'], time() + (86400 * 30), "/");
            $date = new \DateTime();
            if ( $user->fecha_primer_acceso == "" ) {
                $user->fecha_primer_acceso = $date->format('Y-m-d H:i:s');
            }
            $user->fecha_ult_acceso = $date->format('Y-m-d H:i:s');
            $user->numero_accesos += 1;
            
            $_SESSION['user'] = rtrim($user->nombre).' '.rtrim($user->apellidos);
            $_SESSION['id'] = $user->id;
            $_SESSION['perfil'] = $user->perfil;
            $_SESSION['id_empresa'] = $user->id_empresa;

            $sesion->id_usuario = $user->id;
            $sesion->fecha_inicio = $date->format('Y-m-d H:i:s');
            $sesion->ip_origen = $_SERVER['REMOTE_ADDR'];
            $sesion->http_user_agent = $_SERVER['HTTP_USER_AGENT'];
            $sesion->save();

            $_SESSION['id_sesion'] = $sesion->id;

            $permisos = DB::select('SELECT * FROM permisos_rols WHERE id_rol = (SELECT id FROM rols WHERE codigo = "'.$user->perfil.'")');

            $permiso_string = "";
            foreach($permisos as $permiso) {
                $permiso_string .= $permiso->id_permiso."@";
            }

            $_SESSION['permisos'] = $permiso_string;
            $empresa = Empresas::where('id', $user->id_empresa)->first();
            $_SESSION['nombre_aplicacion'] = $empresa->nombre_aplicacion;
            $user->save();
            return \Redirect::to('/'); 
        }
        else
        {
            $date = new \DateTime();
            $fallido = new LoginsFallidos;
            $fallido->fecha = $date->format('Y-m-d H:i:s');
            $user = User::where('login', $_REQUEST['login'])->first();
            if ( is_object($user) ) {
                $fallido->id_usuario = $user->id;
                $fallido->usuario = $user->login;
                $fallido->fallo = 1;
                $message = $this->translator->get('wrong_password');
            } else {
                $fallido->fallo = 2;
                $message = $this->translator->get('user_not_found');
            }
            $fallido->save();
            return \Redirect::to('Login?error='.$message);
        }
    }

    public function logoutAction() {
        $date = new \DateTime();
        $sesion = LogSesiones::where('id', $_SESSION['id_sesion'])->first();
        $sesion->fecha_fin = $date->format('Y-m-d H:i:s');
        $sesion->save();
        session_destroy();
        return \Redirect::to('/'); 
        
    }
}