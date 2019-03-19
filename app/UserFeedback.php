<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserFeedback extends Model
{
    protected $table = "user_feedback";

    public static function getProfileArray($id)
    {
        $lastMonth = new \DateTime();
        $lastMonth->modify('-1 month');
        $sixmonths = new \DateTime();
        $sixmonths->modify('-6 months');
        $lastyear = new \DateTime();
        $lastyear->modify('-1 year');

        $positive_month = count( self::where('id_user', $id)->where('value', 'P')->whereRaw(' date_created >= "'.$lastMonth->format('Y-m-d H:i:s').'"')->get() );
        $positive_sixmonth = count( self::where('id_user', $id)->where('value', 'P')->whereRaw(' date_created >= "'.$sixmonths->format('Y-m-d H:i:s').'"')->get() );
        $positive_year = count( self::where('id_user', $id)->where('value', 'P')->whereRaw(' date_created >= "'.$lastyear->format('Y-m-d H:i:s').'"')->get() );
        
        $neutral_month = count( self::where('id_user', $id)->where('value', 'K')->whereRaw(' date_created >= "'.$lastMonth->format('Y-m-d H:i:s').'"')->get() );
        $neutral_sixmonth = count( self::where('id_user', $id)->where('value', 'K')->whereRaw(' date_created >= "'.$sixmonths->format('Y-m-d H:i:s').'"')->get() );
        $neutral_year = count( self::where('id_user', $id)->where('value', 'K')->whereRaw(' date_created >= "'.$lastyear->format('Y-m-d H:i:s').'"')->get() );
        
        $negative_month = count( self::where('id_user', $id)->where('value', 'N')->whereRaw(' date_created >= "'.$lastMonth->format('Y-m-d H:i:s').'"')->get() );
        $negative_sixmonth = count( self::where('id_user', $id)->where('value', 'N')->whereRaw(' date_created >= "'.$sixmonths->format('Y-m-d H:i:s').'"')->get() );
        $negative_year = count( self::where('id_user', $id)->where('value', 'N')->whereRaw(' date_created >= "'.$lastyear->format('Y-m-d H:i:s').'"')->get() );
        
        $response = new \StdClass;
        $response->positive_month = $positive_month;
        $response->positive_sixmonth = $positive_sixmonth;
        $response->positive_year = $positive_year;
        $response->neutral_month = $neutral_month;
        $response->neutral_sixmonth = $neutral_sixmonth;
        $response->neutral_year = $neutral_year;
        $response->negative_year = $negative_year;
        $response->negative_sixmonth = $negative_sixmonth;
        $response->negative_month = $negative_month;

        return $response;
    }
}
