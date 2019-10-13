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
        $permissions = config('vaslibre.permissions');

        $userPermission = config('vaslibre.user_permissions');

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
    }
}
