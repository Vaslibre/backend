<?php

namespace App\Traits;

use App\Models\Tag;
use App\Models\Category;
use Illuminate\Support\Str;
use Spatie\Sluggable\HasSlug;
use Abr4xas\Utils\SuggestKeyword;
use Spatie\Sluggable\SlugOptions;

/**
 *
 */
trait AppTrait
{
    use HasSlug;

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
     * getRouteKeyName
     *
     * @return void
     */
    public function getRouteKeyName()
    {
        return 'url';
    }

    public function postsPublished()
    {
        return $this->posts()->published();
    }

    /**
     * Collect tags from the request.
     *
     * @param  int $categoryId
     * @return array
     *
     * @source https://github.com/writingink/wink
     */
    public function collectTags($categoryId)
    {
        $allTags = Tag::all();
        $categoryName = Category::whereId($categoryId)->pluck('title')->first();
        $keywords = SuggestKeyword::SuggestKeyword($categoryName);
        return collect($keywords)->map(function ($keyword) use ($allTags) {
            $tag = $allTags->where('slug', Str::slug($keyword))->first();
            if (! $tag) {
                $tag = Tag::firstOrCreate([
                    'title' => $keyword,
                ]);
            }
            return (string) $tag->id;
        })->toArray();
    }
}
