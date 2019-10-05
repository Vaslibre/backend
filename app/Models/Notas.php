<?php

namespace App\Models;

use Carbon\Carbon;
use App\Traits\AppTrait;
use Illuminate\Database\Eloquent\Model;

class Notas extends Model
{
    use AppTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titulo',
        'intro',
        'texto',
        'url',
        'postea',
        'publicado',
    ];

    public function getNotas($slug)
    {
        $nota   = Notas::whereUrl($slug)->firstOrFail();

        $min    = Notas::where('id', '<', $nota->id)
                        ->wherePublicado(true)
                        ->max('id');
        $max    = Notas::where('id', '>', $nota->id)
                        ->wherePublicado(true)
                        ->min('id');

        $previous   = Notas::whereId($min)->first();
        $next       = Notas::whereId($max)->first();

        return view('front.publicacion', compact('nota','previous','next'));
    }

    public function scopeFilter($query, $filters)
    {
        if (isset($filters['month']) && isset($filters['year'])) {
            if ($month = $filters['month']) {
                $query->whereMonth('created_at', Carbon::parse($month)->month);
            }

            if ($year = $filters['year']) {
                $query->whereYear('created_at', $year);
            }
        }
    }

    public static function archives()
    {
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year','month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();
    }

    public static function toAbout()
    {
        return redirect()->route('nosotros');
    }

    public static function oldToNewPost($id)
    {
        $slug = Notas::whereId($id)->value('url');

        return redirect()->action(
            'HomeController@show', ['slug' => $slug]
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
