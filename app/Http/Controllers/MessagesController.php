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
use \App\Messages;
use \App\Conversations;
use \App\MessagesSent;
use \App\Listings;

class MessagesController extends BaseController
{

    public function __construct() {
        parent::__construct();
    }

    public function sendAction()
    {
        $date = new \DateTime();
        $message = new MessagesSent;
        $message->id_sender = $_SESSION['id'];
        $message->id_conversation = $_REQUEST['id'];
        $this->checkMessage();
        $message->str_message = nl2br($_REQUEST['str_message']);
        $message->date_sent = $date->format('Y-m-d H:i:s');
        $message->save();

        
        $id = $_REQUEST['id'];
        $conversation = Conversations::where("id", $id)->first();
        $messages = $conversation->getMessages();

        $response = $this::makeConversation($messages);  
        
        return $response;
    }


    public function defaultAction() {
        $this->data = $this->makeArray(
            DB::select('SELECT *, CONCAT(users.str_name, " ", users.str_surname) AS sender
            , conversations.id
            FROM conversations
            LEFT JOIN users ON users.id = conversations.id_courier
            LEFT JOIN listings ON listings.id_listing = conversations.id_listing
            WHERE conversations.id_user = '.$_SESSION["id"])
        );

        $this->campos[] = array(
            'name' => 'str_user',
            'title' => "Sender",
            'width' => "40"
        );
        $this->campos[] = array(
            'name' => 'str_title',
            'title' => "Listing"
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
        $conversation = Conversations::where("id", $id)->first();
        $messages = $conversation->getMessages();

        $msg = $this::makeConversation($messages);        

        /*$msg = Messages::where('id', $message->id)->first();
        $msg->fecha_leido = $date->format('Y-m-d H:i:s');
        $msg->save();*/

        $this->cont->body = view('messages/message', array(
            'msgs' => $msg,
            "conversation" => $conversation
        ));

        return $this->RenderView();
    }

    
    protected static function makeConversation( $messages )
    {
        $response = "";
        foreach ( $messages as $message )
        {
            $class = ( (int)$message->id_sender === (int)$_SESSION['id'] ) ? "msg-reply" : "msg-initial";
            $response .= view('messages/message_block', array(
                "message" => $message,
                "class" => $class
            ));
        }
        return $response;
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
                "str_title" => $row->str_title,
                'str_user' => $row->str_user,
                'id' => $row->id
            );
        }
        return $arr;
    }
    
}