<?php

namespace Database\Seeders;

use App\Models\Grade;
use App\Models\Level;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $grades = Grade::all();
        foreach ($grades as $grade) {
            Level::create(['name' => ['ar' => 'الصف الاول', 'en' => 'first'], 'grade_id' => $grade->id]);
            Level::create(['name' => ['ar' => 'الصف الثاني', 'en' => 'second'], 'grade_id' => $grade->id]);
            Level::create(['name' => ['ar' => 'الصف الثالث', 'en' => 'third'], 'grade_id' => $grade->id]);
        }
    }
}
