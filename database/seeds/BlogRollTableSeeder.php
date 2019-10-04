<?php

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
        factory(App\Models\BlogRoll::class, 10)->create();
    }
}
