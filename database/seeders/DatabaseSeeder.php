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
        // $this->call(BloodTypeSeeder::class);
        // $this->call(NationalitieSeeder::class);
        // $this->call(ReligionSeeder::class);
        // $this->call(UserSeeder::class);
        // $this->call(GenderSeeder::class);
        // $this->call(SpecializationSeeder::class);
        // $this->call(GradeSeeder::class);
        // $this->call(LevelSeeder::class);
        // $this->call(ClassRoomSeeder::class);
        $this->call(SettingSeeder::class);
        // $this->call(StudentSeeder::class);
    }
}
