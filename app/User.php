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

        return $Courier;
    }
}
