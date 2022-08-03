<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(BloodTypeSeeder::class);
        $this->call(NationalitieSeeder::class);
        $this->call(ReligionSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(GenderSeeder::class);
        $this->call(SpecializationSeeder::class);
    }
}
