<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Watching;

class WatchingController extends Controller
{
    public function __construct()
    {
        parent::__construct();

    }


    public function defaultAction()
    {
        $listado = $this->paginatedListAction();
        $this->cont->body = view('watching/index', array(
            "listado" => $listado
        ));

        return $this->RenderView();
    }

    public function paginatedListAction()
    {        
        $pageSize = "20";
        $page = ( isset( $_REQUEST['page'] ) && $_REQUEST['page'] != "" ) ? (int)$_REQUEST['page'] : 1;
        $watchingListings = Watching::getMyWatching($page, $pageSize);
        $data = "";
        $message = "Your list is empty!";
        foreach ( $watchingListings as $wl )
        {
            $data .= view('watching/card', array(
                "listing" => $wl
            ));
        }

        $paginated = view('comun/paginated', array(
            "pageSize" => $pageSize,
            "total" => count( $watchingListings ),
            "page" => $page,
            "message" => $message,
            "data" => $data
        ));

        return $paginated;
    }
}
