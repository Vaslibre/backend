<?php

namespace App;

use Carbon\Carbon;
use Spatie\Sluggable\HasSlug;
use App\Traits\DateTranslator;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Nicolaslopezj\Searchable\SearchableTrait;

class Notas extends Model
{

    use SearchableTrait, HasSlug,Notifiable, DateTranslator;

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'titulo' => 10,
            'url' => 5,
        ],
    ];

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
        'postea'
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

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('titulo')
            ->saveSlugsTo('url')
            ->doNotGenerateSlugsOnUpdate();
    }    


    /**
    * Route notifications for the Telegram channel.
    *
    * @return int
    */
    public function routeNotificationForTelegram()
    {
        return env('CHAT_ID');
    }
}
