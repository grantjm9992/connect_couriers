<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Mail\PublicMessage;

class MailShotController extends Controller
{
    public function __construct()
    {
        $this->secure = 1;
        parent::__construct();
    }
    const ADMIN = array(
        "phisoluciones.es@gmail.com"
    );

    public function testAction()
    {
        $listing = \App\Listings::where('id_listing',159)->first();
        \NotificationLogic::newListingMailShot( $listing );
    }

    public function removeMeAction()
    {
        $id = ( isset( $_REQUEST['id'] ) && $_REQUEST['id'] != "" ) ? $_REQUEST['id'] : -1;
        $user = \App\User::where('id', base64_decode( $id ) )->first();
        if ( is_object( $user ) )
        {
            $user->mailshot = -1;
            $user->save();
        }
        return \Redirect::to('/')->send();
    }    
}
