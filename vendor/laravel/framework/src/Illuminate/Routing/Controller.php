<?php

namespace Illuminate\Routing;

use BadMethodCallException;
use Illuminate\Support\Facades\DB;
use \App\Providers\TranslationProvider;

use \App\LogOperaciones;
use \App\Messages;

abstract class Controller
{
    /**
     * The middleware registered on the controller.
     *
     * @var array
     */
    protected $middleware = [];
    // Catch all errors
    protected $errors;
    // Initiate translations;
    protected $translator;
    // cont->body es el contenido
    protected $cont;
    // titulo que sale en la pestaña.
    protected $title;
    // Si hay que construir una tabla
    protected $campos;
    protected $gridId;
    protected $ancho_tabla;
    protected $altura_tabla;
    protected $data;
    protected $dataID;
    protected $detailURL;
    protected $buscador;
    protected $pageSize;
    protected $urlNew;

    
    public $controller;
    public $tableTemplate;
    public $columns;
    public $page_size;
    public $table;
    public $successFunction;

    // Para cada página. Botonera será para añadir, volver, guardar, borrar... etc.
    protected $pageTitle;
    protected $iconClass;
    protected $botonera;

    //For public pages
    protected $secure;
    protected $set_menu;

    /**
     * Register middleware on the controller.
     *
     * @param  array|string|\Closure  $middleware
     * @param  array   $options
     * @return \Illuminate\Routing\ControllerMiddlewareOptions
     */
    public function middleware($middleware, array $options = [])
    {
        foreach ((array) $middleware as $m) {
            $this->middleware[] = [
                'middleware' => $m,
                'options' => &$options,
            ];
        }

        return new ControllerMiddlewareOptions($options);
    }

    /**
     * Get the middleware assigned to the controller.
     *
     * @return array
     */
    public function getMiddleware()
    {
        return $this->middleware;
    }

    /**
     * Execute an action on the controller.
     *
     * @param  string  $method
     * @param  array   $parameters
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function callAction($method, $parameters)
    {
        return call_user_func_array([$this, $method], $parameters);
    }

    /**
     * Handle calls to missing methods on the controller.
     *
     * @param  string  $method
     * @param  array   $parameters
     * @return mixed
     *
     * @throws \BadMethodCallException
     */
    public function __call($method, $parameters)
    {
        throw new BadMethodCallException(sprintf(
            'Method %s::%s does not exist.', static::class, $method
        ));
    }

    public function __construct() {
        
        $this->cont = new \ArrayObject();
        $this->campos = array();
        $this->title = "Connect Couriers";
        $this->pageTitle = "";
        $this->botonera = "";
        $this->iconClass = "";
        $this->gridId = "grid_content";
        $this->ancho_tabla = "100%";
        $this->altura_tabla = "auto";
        $this->dataID = "id";
        $this->detailURL = "";
        $this->pageSize = 12;
        $this->buscador = "";
        $this->set_menu = view('js/set_menu');
        $this->translator = new TranslationProvider();
        $this->errors = "";
        $this->setHeaderAndFooter();

        
        /* DEFAUTL GRID PARAMS */
        $this->tableTemplate = 'comun/grid';
        $this->gridId = "grid";
        $this->page_size = 50;
        $this->successFunction = "";
        $this->body = "";

        $this->setErrors();
        
        if ( $this->secure !== 1 && !isset( $_SESSION['id'] ) )
        {
            die(header('Location: Login'));
        }
    }

    protected function setErrors()
    {
        $html = "";
        if ( isset ( $_SESSION['errors'] ) ) {
            $error_string = $_SESSION['errors'];
            $error_array = explode('@#', $error_string, -1);
            foreach ( $error_array as $error )
            {
                $html .= '<p><div class="alert alert-warning"><i class="fa fa-exclamation-triangle"></i> '.$error.'</div></p>';
            }
            $this->errors = $html;
        }
    }

    protected function setHeaderAndFooter()
    {
        $this->cont->footer = view('layout/footer_home');
        if ( isset( $_SESSION['id'] ) )
        {
            if ( isset ( $_SESSION['admin'] ) )
            {
                $this->cont->header = view('layout/header_admin');
            }
            else
            {
                $message_class = "";
                $messages = DB::select('SELECT * FROM messages WHERE id_reciever = '.$_SESSION['id'].' AND fecha_leido IS NULL');
                if ( count($messages) > 0 )
                {
                    $message_class = "alert-color";
                }
                $this->cont->header = view('layout/header_logged', array(
                    'message_class' => $message_class
                ));
            }
        }
        else
        {
            $this->cont->header = view('layout/header');
        }
    }

    protected function RenderView() {
        $_SESSION['errors'] = "";
            return view('layout/app', array(
                'title' => $this->title,
                'errors' => $this->errors,
                'header' => $this->cont->header,
                'footer' => $this->cont->footer,
                'content' => $this->cont->body,
                'set_menu' => $this->set_menu
            ));
    }

    protected function getErrors() {
        $errors = "";
        if ( isset($_SESSION['errors']) && $_SESSION['errors'] != "" )
        {
            $errors = "<ul>";
            $error_array = explode('@#', $_SESSION['errors'], -1);
            foreach ( $error_array as $error )
            {
                $errors .= "<li>".$error."</li>";
            }
            $errors .= "</ul>";
        }
        $_SESSION['errors'] = "";
        return $errors;
    }

    

    protected function createTable() {

        return view('comun/tabla', array(
            'gridId' => $this->gridId,
            'ancho_tabla' => $this->ancho_tabla,
            'altura_tabla' => $this->altura_tabla,
            'campos' => json_encode($this->campos),
            "dataID" => $this->dataID,
            'data' => json_encode($this->data),
            "detailURL" => $this->detailURL,
            'pageSize' => $this->pageSize
        ));
    }
    
    public function createGrid() {

        $table = view($this->tableTemplate, array(
            'controller' => $this->controller,
            'grid_id' => $this->gridId,
            'columns' => $this->columns,
            'page_size' => $this->page_size,
            'successFunction' => $this->successFunction
        ));

        return $table;
    }

    protected function logOperacion($TipoElemento, $IdElemento, $TipoOperacion, $MetodoOperacion) {
        $date = new \DateTime();
        $lo = new LogOperaciones;
        $lo->id_operador = $_SESSION['id'];
        $lo->fecha = $date->format('Y-m-d H:i:s');
        $lo->tipo_elemento = $TipoElemento;
        $lo->id_elemento = $IdElemento;
        $lo->tipo_operacion = $TipoOperacion;
        $lo->metodo_operacion = $MetodoOperacion;
        $lo->save();
    }

    public function specialGrid($data, $template)
    {

        $grid = view($template, array(
            'data' => $data
        ));

        return $grid;
    }
    
    protected function deleteDir($dirPath) {
        if (! is_dir($dirPath)) {
        }
        if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
            $dirPath .= '/';
        }
        $files = glob($dirPath . '*', GLOB_MARK);
        foreach ($files as $file) {
            if (is_dir($file)) {
                self::deleteDir($file);
            } else {
                unlink($file);
            }
        }
        if ( is_dir($dirPath)) {
            rmdir($dirPath);
        }
        
    }

    
    protected function checkMessage($str_message = null)
    {
        $violations = 0;
        if ( $str_message === null )
        {
            $str_message = $_REQUEST['str_message'];
        }

        $danger_phrases = array(
            "email", "e-mail", "phone", "telephone", "phone number", "text", "message", "contact", "email", "@", ".co.uk", ".com", "dotcom", "dot com", "address"
        );

        foreach ( $danger_phrases as $danger_phrase )
        {
            if ( strpos($str_message, $danger_phrase) > 0 )
            {
                $violations++;
            }
        }

        if ( $violations > 0 )
        {
            $url = $_SERVER['HTTP_REFERER'];
            $_SESSION['errors'] = "Message rule violated. Don't try and be a sneaky cunt@#";
            die( \Redirect::to($url) );
        }
    }
}
