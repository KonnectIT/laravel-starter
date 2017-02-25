<?php

use App\User;
use Illuminate\Database\Seeder;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = factory(User::class)->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin'),
        ]);

        $moderator = factory(User::class)->create([
            'name' => 'Moderator',
            'email' => 'moderator@example.com',
            'password' => bcrypt('moderator'),
        ]);

        $moderator->update(['email' => 'test@test.com']);

        $roleModerator = Role::where('name', 'moderator')->first();
        $moderator->assignRole($roleModerator);

        $roleAdministrator = Role::all();
        $administrator->assignRole($roleAdministrator);

    }
}
