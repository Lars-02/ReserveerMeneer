<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = Role::all();
        $users = User::all();

        $users->random(rand(0, $users->count()))->each(function ($user) use ($roles) {
               $user->roles()->save($roles->random());
        });
    }
}
