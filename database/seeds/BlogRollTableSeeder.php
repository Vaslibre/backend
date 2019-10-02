<?php

use App\BlogRoll;
use Illuminate\Database\Seeder;

class BlogRollTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $broll = new BlogRoll();
        $broll->titulo = 'El blog de abr4xas';
        $broll->url_site = 'https://blog.abr4xas.org';
        $broll->save();
    }
}
