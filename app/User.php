<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Couriers;

class User extends Model
{
    protected $table = "users";

    protected $fillable = [
        "str_name", "str_email", "str_surname", "num_phone"
    ];

    public function getCourierInfo()
    {
        $courierInfo = Couriers::where('id_user', $this->id)->first();
        $completedJobs = Quotes::where('id_user', $this->id)->where('id_status', 4)->get();

        $positiveFeedback = UserFeedback::where('id_user', $this->id)->where('value', 'P')->get();
        $negativeFeedback = UserFeedback::where('id_user', $this->id)->where('value', 'N')->get();
        $neutralFeedback = UserFeedback::where('id_user', $this->id)->where('value', 'K')->get();

        $feedbackScore = round( ( count( $positiveFeedback) + ( count($neutralFeedback) / 2 ) ) / ( count($positiveFeedback) + count($negativeFeedback) + count($neutralFeedback)), 2 );
        $feedbackAmount = count( $positiveFeedback ) + count( $neutralFeedback ) + count( $negativeFeedback );
        $Courier = new \StdClass;
        foreach ( $this->attributes as $key => $value ) 
        {
            $Courier->$key = $value;
        }
        if ( is_object( $courierInfo ) )
        {
            foreach ( $courierInfo->attributes as $key => $value ) 
            {
                $Courier->$key = $value;
            }
        }

        $Courier->completed_jobs = ( count( $completedJobs ) > 0 ) ? count( $completedJobs ) : "0" ;
        $Courier->feedback_score = ( $feedbackScore != "" ) ? $feedbackScore."%" : "";
        $Courier->feedback_amount = ( $feedbackAmount != "" ) ? $feedbackAmount : "0";

        return $Courier;
    }
}
