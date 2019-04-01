<?php

namespace App\Classes;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

use \App\User;
use \App\Verify;
use \App\MailSent;

use \App\Mail\MessageReceived;
use \App\Mail\QuoteReceived;
use \App\Mail\Outbid;
use \App\Mail\BidPlaced;
use \App\Mail\ActionRequired;

use \Exception;

class NotificationLogic {

    /**
     * 
     * Predefine message types
     * 
     */
    const MAILTYPES = array(
        "Message received" => "M",
        "Quote received" => "Q",
        "Outbid" => "O",
        "Bid placed" => "BP",
        "Action required" => "A",
    );
    
    /**
     * Implemented in Messages.send
     * Implemented in Messages.askQuestion
     * 
     */
    public static function gotMessage( $user, $listing )
    {
        \Mail::to( $user->str_email )->send( new MessageReceived( $user, $listing ) );

        $date = new \DateTime();
        $mailSent = new MailSent;
        $mailSent->type = "M";
        $mailSent->user = $user->id;
        $mailSent->user_email = $user->str_email;
        $mailSent->date_sent = $date->format('Y-m-d H:i:s');
        $mailSent->save();
    }

    // Implemented in Quote.add
    public static function gotQuote( $user, $listing ) 
    {
        \Mail::to ( $user->str_email )->send ( new QuoteReceived( $user, $listing ) );
        
        $date = new \DateTime();
        $mailSent = new MailSent;
        $mailSent->type = "Q";
        $mailSent->user = $user->id;
        $mailSent->user_email = $user->str_email;
        $mailSent->date_sent = $date->format('Y-m-d H:i:s');
        $mailSent->save();
    }

    // Implemented in App\Quotes::updateQuotesForListing()
    public static function outbid( $user, $listing ) 
    {
        \Mail::to ( $user->str_email )->send ( new Outbid( $user, $listing ) );
        
        $date = new \DateTime();
        $mailSent = new MailSent;
        $mailSent->type = "O";
        $mailSent->user = $user->id;
        $mailSent->user_email = $user->str_email;
        $mailSent->date_sent = $date->format('Y-m-d H:i:s');
        $mailSent->save();
    }

    public static function bidPlaced( $user, $listing ) 
    {
        \Mail::to ( $user->str_email )->send ( new BidPlaced( $user, $listing ) );
        
        $date = new \DateTime();
        $mailSent = new MailSent;
        $mailSent->type = "BP";
        $mailSent->user = $user->id;
        $mailSent->user_email = $user->str_email;
        $mailSent->date_sent = $date->format('Y-m-d H:i:s');
        $mailSent->save();
    }

    
    public static function actionRequired( $user, $listing ) 
    {
        \Mail::to ( $user->str_email )->send ( new ActionRequired( $user, $listing ) );
        
        $date = new \DateTime();
        $mailSent = new MailSent;
        $mailSent->type = "A";
        $mailSent->user = $user->id;
        $mailSent->user_email = $user->str_email;
        $mailSent->date_sent = $date->format('Y-m-d H:i:s');
        $mailSent->save();
    }
}
