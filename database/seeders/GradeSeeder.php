<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Grade::create(['name' => ['ar' => 'المرحلة الابتدائية', 'en' => 'primary school']]);
        Grade::create(['name' => ['ar' => 'المرحلة الاعدادية', 'en' => 'prepartory school']]);
        Grade::create(['name' => ['ar' => 'المرحلة الثانوية', 'en' => 'high school']]);
    }
}
