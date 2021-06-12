<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::factory()
            ->create([
                'firstname' => 'Super',
                'lastname' => 'Admin',
                'email' => 'admin@admin.com']);
        $admin->roles()->sync(Role::all()->where('name','Admin'));
        User::factory()
            ->create([
                'firstname' => 'Lars',
                'lastname' => 'Meeuwsen',
                'email' => 'larsmeeuwsen@gmail.com']);
        User::factory()
            ->create([
                'firstname' => 'Maik',
                'lastname' => 'de Kruif',
                'email' => 'maikka39@gmail.com']);

        User::factory()
            ->count(97)
            ->create();
    }
}
