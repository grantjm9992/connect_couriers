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
use \App\Notifications;
use \App\Listings;

class MessagesController extends BaseController
{

    private $url;

    public function __construct() {
        parent::__construct();

        $this->url = ( isset ( $_SERVER['HTTP_REFERER'] ) && $_SERVER['HTTP_REFERER'] != "" ) ? $_SERVER['HTTP_REFERER'] : "Messages";
    }

    
    public function askQuestionAction()
    {
        $conversation = new Conversations;
        $conversation->id_courier = $_SESSION['id'];
        $conversation->id_user = $_REQUEST['id_receiver'];
        $conversation->id_listing = $_REQUEST['id_listing'];
        $conversation->save();

        $date = new \DateTime();
        $message = new MessagesSent;
        $message->id_sender = $_SESSION['id'];
        $message->id_conversation = $conversation->id;
        $message->id_receiver = $_REQUEST['id_receiver'];
        $this->checkMessage();
        $message->str_message = nl2br($_REQUEST['str_message']);
        $message->date_sent = $date->format('Y-m-d H:i:s');
        $message->save();
        
        $listing = Listings::where('id_listing', $_REQUEST['id_listing'])->first();
        $notify = new Notifications;
        $notify->id_user = $message->id_receiver;
        $notify->bln_notified = 0;
        $notify->str_message = "Someone has messaged you about your listing: $listing->str_title";
        $notify->save();
        
        $user = User::where('id', $message->id_receiver )->first();
        \NotificationLogic::gotMessage( $user, $listing );

        return \Redirect::to($_REQUEST['url']);
    }

    public function sendAction()
    {
        $date = new \DateTime();
        $message = new MessagesSent;
        $message->id_sender = $_SESSION['id'];
        $message->id_conversation = $_REQUEST['id'];
        $message->id_receiver = $_REQUEST['id_receiver'];
        $this->checkMessage();
        $message->str_message = nl2br($_REQUEST['str_message']);
        $message->date_sent = $date->format('Y-m-d H:i:s');
        $message->save();

        
        $id = $_REQUEST['id'];
        $conversation = Conversations::where("id", $id)->first();
        $messages = $conversation->getMessages();

        $response = $this::makeConversation($messages);

        
        $notify = new Notifications;
        $notify->id_user = $message->id_receiver;
        $notify->bln_notified = 0;
        $notify->str_message = "You have a new message";
        $notify->save();

        $user = User::where('id', $message->id_receiver )->first();
        $listing = Listings::where('id_listing', $conversation->id_listing)->first();
        \NotificationLogic::gotMessage( $user, $listing );
        
        return $response;
    }


    public function defaultAction() {
        if ( (int)$_SESSION['id_user_type'] === 2 )
        {
            $sql = 'SELECT *, CONCAT(users.str_name, " ", users.str_surname) AS sender
            , conversations.id
            FROM conversations
            LEFT JOIN users ON users.id = conversations.id_courier
            LEFT JOIN listings ON listings.id_listing = conversations.id_listing
            WHERE conversations.id_courier = '.$_SESSION["id"];
        }
        else
        {
            $sql = 'SELECT *, CONCAT(users.str_name, " ", users.str_surname) AS sender
            , conversations.id
            FROM conversations
            LEFT JOIN users ON users.id = conversations.id_courier
            LEFT JOIN listings ON listings.id_listing = conversations.id_listing
            WHERE conversations.id_user = '.$_SESSION["id"];
        }
        $this->data = $this->makeArray(
            DB::select($sql)
        );

        $this->campos[] = array(
            'name' => 'str_user',
            'title' => "Sender",
            'width' => "60"
        );
        $this->campos[] = array(
            'name' => 'str_title',
            'title' => "Listing"
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
        $listing = Listings::where('id_listing', $conversation->id_listing)->first();
        $messages = $conversation->getMessages();

        $msg = $this::makeConversation($messages);        

        /*$msg = Messages::where('id', $message->id)->first();
        $msg->fecha_leido = $date->format('Y-m-d H:i:s');
        $msg->save();*/

        $this->cont->body = view('messages/message', array(
            'msgs' => $msg,
            "conversation" => $conversation,
            "url" => "Messages",
            "listing" => $listing
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