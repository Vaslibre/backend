<?php

namespace App\Services;

use Analytics;
use Spatie\Analytics\Period;

class Trending
{
   public static function week($limit = 6)
   {
       return self::getResults(7);
   }

   protected static function getResults($days, $limit=6)
   {
      $data = Analytics::fetchMostVisitedPages(Period::days($days), $limit);
      return self::parseResults($data, $limit);
   }

   protected static function parseResults($data, $limit)
   {
       return $data->reject(function($item){
           return $item['url'] == '/' or
           $item['url'] == '/login' or
           $item['url'] == '/nosotros' or
           starts_with($item['url'], '/notas');
       })->unique('url')->transform(function($item){
           $item['pageTitle'] = str_replace('Vaslibre - ', '', $item['pageTitle']);
           return $item;
       })->splice(0, $limit);
   }

}