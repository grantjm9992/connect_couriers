<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Couriers extends Model
{
    protected $table = "couriers";

    protected $primaryKey = "id_user";

    protected $fillable = [
        "id_transportista_type",
        "id_company_type",
        "num_employees",
        "num_drivers",
        "num_vehicles",
        "year_established",
        "regions",
        "payment_types",
        "categories",
        "bln_git",
        "level_git",
        "coment_git",
        "bln_cmr",
        "level_cmr",
        "coment_cmr",
        "bln_other",
        "level_other",
        "coment_other"
    ];
}
