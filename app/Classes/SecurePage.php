<?php

namespace App\Classes;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

use \App\User;

use \Exception;

class SecurePage {

    public $response = null;
    private $element = null;
    private $userIndex = null;

    public function __construct( $element, $userIndex ) {
        $this->element = $element;
        $this->userIndex = $userIndex;
        $this->init();
        if ( $this->response === true )
        {
            return $this->response;
        }
        else
        {
            \Redirect::to('MyAccount')->send();
        }
    }

    public function init() {
        return $this->isUsersItem();
    }

    protected function isUsersItem()
    {
        $UI = $this->userIndex;
        $this->response = ($this->element->$UI == $_SESSION['id']) ? true : false;
        return $this->response;
    }
}
