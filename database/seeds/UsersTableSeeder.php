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
        $permissions = [
            'users.all',
            'users.index',
            'users.show',
            'users.add',
            'users.edit',
            'users.delete',
            'notas.all',
            'notas.index',
            'notas.show',
            'notas.add',
            'notas.edit',
            'notas.delete',
            'banner.all',
            'banner.index',
            'banner.show',
            'banner.add',
            'banner.edit',
            'banner.delete',
            'blogroll.all',
            'blogroll.index',
            'blogroll.show',
            'blogroll.add',
            'blogroll.edit',
            'blogroll.delete',
            'publicaciones.all',
            'publicaciones.index',
            'publicaciones.show',
            'publicaciones.add',
            'publicaciones.edit',
            'publicaciones.delete',
        ];

        App\Models\User::create([
            'name'              => 'VaSLibre',
            'email'             => 'webmaster@vaslibre.org.ve',
            'email_verified_at' => now(),
            'password'          => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token'    => Str::random(10),
        ])->each(function (App\Models\User $user) use ($permissions) {
            $user->assignRole('admin');
            $user->givePermissionTo($permissions);
        });

        App\Models\User::create([
            'name'              => 'ángel',
            'email'             => 'bullgram@gmail.com',
            'email_verified_at' => now(),
            'password'          => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token'    => Str::random(10),
        ])->each(function (App\Models\User $user) use ($permissions) {
            $user->assignRole('admin');
            $user->givePermissionTo($permissions);
        });

        factory(App\Models\User::class, 28)
            ->create()
            ->each(function (App\Models\User $user) {
                $user->assignRole('user');
                $user->givePermissionTo([
                    'notas.index',
                    'notas.add',
                    'notas.edit',
                    'notas.delete',
                ]);
        });
    }
}
