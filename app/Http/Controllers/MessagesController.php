<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use \App\Providers\TranslationProvider;
use Illuminate\Http\Request;
use \App\User;
use \App\Messages;
use \App\Listings;

class MessagesController extends BaseController
{

    public function __construct() {
        parent::__construct();
    }

    public function sendAction()
    {
        $date = new \DateTime();
        $message = new Messages;
        $message->id_sender = $_SESSION['id'];
        $message->id_reciever = $_REQUEST['id_reciever'];
        $this->checkMessage();
        $message->str_message = $_REQUEST['str_message'];
        if ( isset ( $_REQUEST['id_reply_to'] ) && $_REQUEST['id_reply_to'] != "" ) {
            $message->id_reply_to = $_REQUEST['id_reply_to'];
        }
        $message->id_listing = $_REQUEST['id_listing'];
        $message->fecha_enviado = $date->format('Y-m-d H:i:s');
        $message->save();

        if ( isset( $_REQUEST['url'] ) && $_REQUEST['url'] != "" )
        {
            return \Redirect::to($_REQUEST['url']);
        }
        else
        {
            return \Redirect::to('Messages');
        }
    }


    public function defaultAction() {
        /*$this->data = $this->makeArray(DB::select('SELECT *, CONCAT(users.str_name, " ", users.str_surname) AS sender, messages.id FROM messages
                                    LEFT JOIN users ON messages.id_sender = users.id
                                    WHERE messages.id_reciever = '.$_SESSION['id']));*/

        $this->data = $this->makeArray(
            DB::select('SELECT *, CONCAT(users.str_name, " ", users.str_surname) AS sender
            FROM conversations
            LEFT JOIN users ON users.id = conversations.id_courier
            WHERE conversations.id_user = '.$_SESSION["id"])
        );
        
        $this->campos[] = array(
            'name' => 'sender',
            'title' => "Sender",
            'width' => "40"
        );
        $this->campos[] = array(
            'name' => 'str_message',
            'title' => "Message"
        );
        $this->campos[] = array(
            'name' => 'input',
            'title' => '',
            'width' => '4px'
        );
        $this->detailURL = "Messages.message?id=";
        $table = $this->createTable();
        $this->cont->body = view('messages/index', array(
            'table' => $table
            )
        );
        return $this->RenderView();
    }

    public function messageAction()
    {
        $date = new \DateTime();
        $id = $_REQUEST['id'];
        $message = Messages::getFromId($id);

        $msg = Messages::where('id', $message->id)->first();
        $msg->fecha_leido = $date->format('Y-m-d H:i:s');
        $msg->save();

        $this->cont->body = view('messages/message', array(
            'message' => $message
        ));

        return $this->RenderView();
    }

    public function newFromModalAction()
    {
        $id = $_REQUEST['id'];
        $url = $_SERVER['HTTP_REFERER'];

        $listing = Listings::getListingWithUser($id);
        return view('messages/add_modal', array(
            'listing' => $listing,
            "url" => $url
        ));
    }


    protected function makeArray($rs)
    {
        $arr = array();
        foreach ( $rs as $row )
        {
            $arr[] = array(
                'input' => '<input type="checkbox" id="'.$row->id.'">',
                'str_message' => "",
                'sender' => $row->sender,
                'id' => $row->id
            );
        }
        return $arr;
    }
    
}