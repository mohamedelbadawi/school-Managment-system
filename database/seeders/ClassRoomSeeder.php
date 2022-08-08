<?php

namespace Database\Seeders;

use App\Models\ClassRoom;
use App\Models\Level;
use Illuminate\Database\Seeder;

class ClassRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $levels = Level::all();
        foreach ($levels as $level) {
            ClassRoom::create(['name' => ['ar' => ' ا', 'en' => 'A'], 'grade_id' => $level->grade_id, 'level_id' => $level->id]);
            ClassRoom::create(['name' => ['ar' => ' ب', 'en' => 'B'], 'grade_id' => $level->grade_id, 'level_id' => $level->id]);
            ClassRoom::create(['name' => ['ar' => 'ت ', 'en' => 'C'], 'grade_id' => $level->grade_id, 'level_id' => $level->id]);
        }
    }
}
