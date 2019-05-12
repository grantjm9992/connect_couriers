<?php

namespace App\Classes;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

use \App\User;

use \Exception;

class UserLogic {

    
    /**
     * 
     */

    public static function updateUserStatus()
    {
        $date = new \DateTime();
        $date->modify('+ 5 minutes');
        $user = User::where('id', $_SESSION['id'])->first();
        $user->date_online_expires = $date->format('Y-m-d H:i:s');
        $user->save();
    }
    
    public static function getUser( $id = null )
    {
        $id = ( is_null ( $id ) ) ? $_SESSION['id'] : $id;
        return User::where('id', $id)->first();
    }

    public function getUserStatus()
    {
        $now = new \DateTime();
        $expires = new \DateTime( $this->date_online_expires );
        if ( $now > $expires )
        {
            $result = array(
                "status" => "offline",
                "message" => "Last seen: ".self::makeDate( $expires )
            );
        }
        else
        {
            $result = array(
                "status" => "online"
            );
        }
        return $result;
    }

    public static function _getUserStatus( $user )
    {
        $now = new \DateTime();
        $expires = new \DateTime( $user->date_online_expires );
        if ( $now > $expires )
        {
            $result = array(
                "status" => "offline",
                "message" => "Last seen: ".self::makeDate( $expires )
            );
        }
        else
        {
            $result = array(
                "status" => "online"
            );
        }
        return $result;
    }

    protected static function makeDate( $dateTimeObject )
    {
        $now = new \DateTime();
        $diff = $now->diff($dateTimeObject);
        if ( (int)$diff->format('%a') === 0 )
        {
            $response = "Today at ".$dateTimeObject->format('H:i');
        }
        elseif( (int)$diff->format('%a') === 1 )
        {
            $response= "Yesterday at ".$dateTimeObject->format('H:i');
        }
        else
        {
            $response = $dateTimeObject->format('d/m/Y')." at ".$dateTimeObject->format('H:i');
        }
        return $response;
    }
}
