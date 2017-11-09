<?php

namespace App\Services;

use Analytics;
use Spatie\Analytics\Period;

class Trending
{
   public static function week($limit = 6)
   {
       return self::getResults(30);
   }

   protected static function getResults($days, $limit=20)
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
           $item['url'] == '/archivos' or
           $item['url'] == '/?page=3' or
           $item['url'] == '/?page=2' or
           $item['url'] == '/notas';
        //    starts_with($item['url'], '/notas');
       })->unique('url')->transform(function($item){
           $item['pageTitle'] = str_replace('Vaslibre - ', '', $item['pageTitle']);
           return $item;
       })->splice(0, $limit);
   }

}