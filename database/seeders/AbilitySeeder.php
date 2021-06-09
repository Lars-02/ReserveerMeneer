<?php

namespace Database\Seeders;

use App\Models\Ability;
use Illuminate\Database\Seeder;

class AbilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ability::factory()->createMany([
            ['name' => '*.*', 'label' => 'Pass any policy'],
            ['name' => 'event.*', 'label' => 'Pass all event policies'],
        ]);
    }
}
