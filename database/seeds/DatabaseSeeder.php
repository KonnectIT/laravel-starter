<?php

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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

        DB::table('roles')->truncate();
        DB::table('permissions')->truncate();
        DB::table('users')->truncate();
        DB::table('role_has_permissions')->truncate();
        DB::table('user_has_permissions')->truncate();
        DB::table('user_has_roles')->truncate();
        DB::table('activity_log')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        $this->call(PermissionsSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
