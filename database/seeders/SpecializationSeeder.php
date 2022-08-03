<?php

namespace Database\Seeders;

use App\Models\Specialization;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specializations')->delete();
        $specializations = [
            ['en' => 'Arabic', 'ar' => 'لغة عربية'],
            ['en' => 'Sciences', 'ar' => 'علوم'],
            ['en' => 'Computer', 'ar' => 'حاسب الي'],
            ['en' => 'English', 'ar' => 'انجليزي'],
            ['en' => 'Math', 'ar' => 'رياضيات'],
            ['en' => 'Physics', 'ar' => 'فيزياء'],
            ['en' => 'Chemistry', 'ar' => 'كيمياء'],
        ];
        foreach ($specializations as $S) {
            Specialization::create(['name' => $S]);
        }
    }
}
