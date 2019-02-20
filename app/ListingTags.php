<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListingTags extends Model
{
    protected $table = "listings_tags";
    protected $primaryKey = ['id_listing', 'tag'];
    public $incrementing = false;
    
    protected function setKeysForSaveQuery(Builder $query)
    {
        $query
            ->where('id_listing', '=', $this->getAttribute('id_listing'))
            ->where('tag', '=', $this->getAttribute('tag'));
        return $query;
    }
}
