<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->command->info('Realizando migración para los roles y permisos...');

        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Seed the default permissions
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

        $userPermission = [
            'notas.index',
            'notas.add',
            'notas.edit',
            'notas.delete',
        ];

        $this->command->info('Creando permisos...');
        foreach ($permissions as $perms) {
            Permission::firstOrCreate(['name' => $perms]);
        }

        $this->command->info('Creando roles...');

        $roles_array = [
            'admin',
            'user',
        ];

        // Create Roles
        foreach ($roles_array as $rol) {
            $role = Role::firstOrCreate(['name' => $rol]);
            if ($role->name == 'admin') {
                // assign all permissions
                $role->syncPermissions(Permission::all());
                $this->command->info('Admin granted all the permissions');
            }
            // for others by default only read access
            $role->syncPermissions(Permission::where('name', 'LIKE', 'notas.%')->get());
        }

        // $helpdesk = User::find(1);
        // $helpdesk->assignRole('admin');
        // $helpdesk->givePermissionTo($permissions);

        // $admin = User::find(2);
        // $admin->assignRole('admin');
        // $admin->givePermissionTo($permissions);
    }
}
