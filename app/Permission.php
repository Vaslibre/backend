<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends \Spatie\Permission\Models\Permission
{

    /**
     * Create default Permissions
     *
     */

    public static function defaultPermissions()
    {
        return [
            'view_users',
            'add_users',
            'edit_users',
            'delete_users',

            'view_roles',
            'add_roles',
            'edit_roles',
            'delete_roles',

            'view_pages',
            'add_pages',
            'edit_pages',
            'delete_pages',

            'view_profile',
            'edit_profile',
        ];
    }

}
