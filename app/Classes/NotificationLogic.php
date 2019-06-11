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
use \App\Mail\WelcomeUser;
use \App\Mail\QuoteAccepted;
use \App\Mail\QuoteDeclined;
use \App\Mail\QuoteWithdrawn;
use \App\Mail\ErrorFound;
use \App\Mail\ListingAdmin;
use \App\Mail\NewListing;

use \Exception;

class NotificationLogic {

    /**
     * 
     * Technical Emails
     * 
     */

    const TECH = array(
        "phisoluciones.es@gmail.com"
    );

    const ADMIN = array(
        "phisoluciones.es@gmail.com", "gary@gmacd.co.uk", "info@dshub.co.uk"
    );

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
        "New User" => "N",
        "Quote accepted" => "QA",
        "Quote declined" => "QD",
        "Quote withdrawn" => "QW",
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

    public static function userSignedUp( $user )
    {
        \Mail::to ( $user->str_email )->send( new WelcomeUser( $user ) );

        $date = new \DateTime();
        $mailSent = new MailSent;
        $mailSent->type = "N";
        $mailSent->user = $user->id;
        $mailSent->user_email = $user->str_email;
        $mailSent->date_sent = $date->format('Y-m-d H:i:s');
        $mailSent->save();
    }

    public static function sendFoundError( $error )
    {
        \Mail::to( self::TECH )->send( new ErrorFound( $error ) );
    }

    public static function quoteAccepted( $user, $listing )
    {
        \Mail::to ( $user->str_email )->send ( new QuoteAccepted( $user, $listing ) );
        
        $date = new \DateTime();
        $mailSent = new MailSent;
        $mailSent->type = "QA";
        $mailSent->user = $user->id;
        $mailSent->user_email = $user->str_email;
        $mailSent->date_sent = $date->format('Y-m-d H:i:s');
        $mailSent->save();
    }

    public static function quoteDeclined( $user, $listing )
    {
        \Mail::to ( $user->str_email )->send ( new QuoteDeclined( $user, $listing ) );
        
        $date = new \DateTime();
        $mailSent = new MailSent;
        $mailSent->type = "QD";
        $mailSent->user = $user->id;
        $mailSent->user_email = $user->str_email;
        $mailSent->date_sent = $date->format('Y-m-d H:i:s');
        $mailSent->save();
    }

    public static function quoteWithdrawn( $user, $listing )
    {
        \Mail::to ( $user->str_email )->send ( new QuoteWithdrawn( $user, $listing ) );
        
        $date = new \DateTime();
        $mailSent = new MailSent;
        $mailSent->type = "QW";
        $mailSent->user = $user->id;
        $mailSent->user_email = $user->str_email;
        $mailSent->date_sent = $date->format('Y-m-d H:i:s');
        $mailSent->save();
    }
    
    public static function newListingAdmin( $listing )
    {
        \Mail::to ( self::ADMIN )->send( new ListingAdmin( $listing ) );
    }

    public static function newListingMailShot( $listing )
    {
        $i = 0;
        $listing->getImage();
        $couriers = \App\User::where('id_user_type', 2)->whereRaw(' ( mailshot IS NULL or mailshot > 0 ) ')->get();
        foreach ( $couriers as $courier )
        {
            $i++;
            \Mail::to( $courier->str_email )->send( new NewListing( $listing, $courier ) );
        }
    }
}
