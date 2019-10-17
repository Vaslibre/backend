<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        App\Models\User::create([
            'name'              => 'VaSLibre',
            'email'             => 'webmaster@vaslibre.org.ve',
            'email_verified_at' => now(),
            'password'          => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token'    => Str::random(10),
        ])->each(function (App\Models\User $user) {
            $user->assignRole('admin');
            $user->givePermissionTo(config('vaslibre.permissions'));
        });

        App\Models\User::create([
            'name'              => 'ángel',
            'email'             => 'bullgram@gmail.com',
            'email_verified_at' => now(),
            'password'          => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token'    => Str::random(10),
        ])->each(function (App\Models\User $user) {
            $user->assignRole('admin');
            $user->givePermissionTo(config('vaslibre.permissions'));
        });

        factory(App\Models\User::class, 1)
            ->create()
            ->each(function (App\Models\User $user) {
                $user->assignRole('user');
                $user->givePermissionTo(config('vaslibre.user_permissions'));
        });
    }
}
