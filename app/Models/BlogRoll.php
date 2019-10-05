<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogRoll extends Model
{

    protected $table = 'blogroll';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
        'titulo',
        'url_site',
    ];

    public static function getFriends()
    {
        return static::orderByRaw("RAND()")->paginate(6);
    }
}
