<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * administrator
         */
        $roleAdministrator = Role::create(['name' => 'administrator']);

        // CRUD
        $this->attachRoleToPermission($roleAdministrator, 'create user');
        $this->attachRoleToPermission($roleAdministrator, 'read user');
        $this->attachRoleToPermission($roleAdministrator, 'update user');
        $this->attachRoleToPermission($roleAdministrator, 'delete user');

        /**
         * moderator
         */
        $roleModerator = Role::create(['name' => 'moderator']);

        // CRUD
        $this->attachRoleToPermission($roleModerator, 'create faq');
        $this->attachRoleToPermission($roleModerator, 'read faq');
        $this->attachRoleToPermission($roleModerator, 'update faq');
        $this->attachRoleToPermission($roleModerator, 'delete faq');

    }

    private function attachRoleToPermission(Role $role, $permissionAsString) {
        $permission = Permission::create(['name' => $permissionAsString]);
        $role->givePermissionTo($permission);
    }
}
