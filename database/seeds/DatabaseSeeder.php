<?php

use App\User;
use App\Role;
use App\Permission;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ask for db migration refresh, default is no
        if ($this->command->confirm('Do you wish to refresh migration before seeding, it will clear all old data ?')) {
            // Call the php artisan migrate:refresh
            $this->command->call('migrate:refresh');
            $this->command->warn("Data cleared, starting from blank database.");
        }

        // Seed the default permissions
        $permissions = Permission::defaultPermissions();

        foreach ($permissions as $perms) {
            Permission::firstOrCreate(['name' => $perms]);
        }

        $this->command->info('Default Permissions added.');

        // Confirm roles needed
        if ($this->command->confirm('Create Roles for user, default is admin user and blog? [y|N]', true)) {

            // Ask for roles from input
            $input_roles = $this->command->ask('Enter roles in comma separate format.', 'Admin,User,Blog');

            // Explode roles
            $roles_array = explode(',', $input_roles);

            // add roles
            foreach($roles_array as $role) {
                $role = Role::firstOrCreate(['name' => trim($role)]);

                if( $role->name == 'Admin' ) {
                    // assign all permissions
                    $role->syncPermissions(Permission::all());
                    $this->command->info('Admin granted all the permissions');

                } else if( $role->name == 'Blog' ) {

                    $role->syncPermissions(Permission::where('name', 'LIKE', 'view_post')
                        ->orWhere('name', 'LIKE', 'add_post')
                        ->orWhere('name', 'LIKE', 'edit_post')
                        ->orWhere('name', 'LIKE', 'delete_post')
                        ->get());

                    $this->command->info('Added blog permissions');
                } else {

                // for others by default only profile access
                $role->syncPermissions(Permission::where('name', 'LIKE', 'view_profile')
                    ->orWhere('name', 'LIKE', 'edit_profile')
                    ->get());

                    $this->command->info('Added user permissions');
                }
                // create one user for each role
                $this->createUser($role);
            }

            $this->command->info('Roles ' . $input_roles . ' added successfully');

        } else {
            Role::firstOrCreate(['name' => 'User']);
            $this->command->info('Added only default user role.');
        }

        $this->command->warn('All done :)');
    }

    /**
     * Create a user with given role
     *
     * @param $role
     */
    private function createUser($role)
    {
        $user = factory(User::class)->create();
        $user->assignRole($role->name);

        if( $role->name == 'Admin' ) {
            $this->command->info('Here is your admin details to login:');
            $this->command->warn($user->email);
            $this->command->warn('Password is "secret"');
        }
        if( $role->name == 'User' ) {
            $this->command->info('Here is your User details to login:');
            $this->command->warn($user->email);
            $this->command->warn('Password is "secret"');
        }
        if( $role->name == 'Blog' ) {
            $this->command->info('Here is your Blog details to login:');
            $this->command->warn($user->email);
            $this->command->warn('Password is "secret"');
        }
    }
}
