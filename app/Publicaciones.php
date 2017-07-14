<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publicaciones extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titulo', 
        'intro',
        'url', 
        'postea'
    ];


    public function getAll()
    {
        $result = Publicaciones::orderBy('id', 'desc')
            ->paginate(6);

        return view('front.notas', compact('result'));
    }

    public function getPublicacion($slug)
    {
        $nota   = Publicaciones::whereUrl($slug)->first();
        $min    = Publicaciones::where('id', '<', $nota->id)->max('id');
        $max    = Publicaciones::where('id', '>', $nota->id)->min('id');

        $previous   = Publicaciones::whereId($min)->first();
        $next       = Publicaciones::whereId($max)->first();
        return view('front.detalle-publicaciones', compact('nota','previous','next'));
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }    
}
