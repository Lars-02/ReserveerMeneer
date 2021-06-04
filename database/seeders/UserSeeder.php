<?php

namespace Database\Seeders;

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
            ->count(18)
            ->create();
    }
}
