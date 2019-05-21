<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Problems extends Model
{
    protected $table = "problems";
    protected $fillable = ["type", "description"];
}
