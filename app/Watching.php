<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Watching extends Model
{
    protected $table = "watching";

    public static function getMyWatching( $page, $pageSize )
    {
        $listings = array();
        $myWatching = Watching::where('id_user', $_SESSION['id'])->skip(($page - 1)*$pageSize)->take($pageSize)->get();
        foreach ( $myWatching as $row )
        {
            $listing = Listings::where('id_listing', $row->id_listing)->first();
            $listings[] = $listing;
        }

        return $listings;
    }

    
    protected static function makeLimit( $page = null )
    {
        if ( $page === null ) return null;
        $limit = ( (int)$page - 1 )*20;
        return " LIMIT $limit, 20 ";
    }
}
