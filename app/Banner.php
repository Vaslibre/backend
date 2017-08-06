<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'banner';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titulo', 
        'url_site', 
        'url_banner',
    ];

    public static function getBanner()
    {
        return static::orderByRaw("RAND()")->first();
    }

    public static function getFriends()
    {
        return static::orderByRaw("RAND()")->get();
    }

}
