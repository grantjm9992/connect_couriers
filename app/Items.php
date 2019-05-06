<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    protected $table = "items";
    protected $fillable = ["id_listing", "str_description", "weight", "weight_unit", "length", "width", "height", "length_unit"];
}
