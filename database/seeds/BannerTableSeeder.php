<?php

use App\Banner;
use Illuminate\Database\Seeder;

class BannerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banner = new Banner();
        $banner->titulo = 'Valencia/Venezuela Software Libre';
        $banner->url_site = 'http://www.vaslibre.org.ve';
        $banner->url_banner = 'http://www.vaslibre.org.ve/logo/vaslibre_468_60.png';
        $banner->save();
    }
}
