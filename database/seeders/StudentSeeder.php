<?php

namespace Database\Seeders;

use App\Models\BloodType;
use App\Models\Gender;
use App\Models\Grade;
use App\Models\Nationalitie;
use App\Models\Student;
use App\Models\StudentParent;
use Faker\Core\Blood;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('students')->delete();
        // $faker = Factory::create();
        $grades = Grade::all();
        foreach ($grades as $grade) {
            foreach ($grade->levels as $level) {
                foreach ($level->classrooms as $classroom) {
                    for ($i = 0; $i < 1; $i++) {
                        Student::create([
                            'name' => "mohamed" . $i,
                            'email' => 'mohamed' . rand(1, 1000000) . '@gmail.com',
                            'password' => bcrypt('123456789'),
                            'gender_id' => Gender::inRandomOrder()->first()->id,
                            'level_id' => $level->id,
                            'grade_id' => $grade->id,
                            'class_room_id' => $classroom->id,
                            'student_parent_id' => StudentParent::inRandomOrder()->first()->id,
                            'date_birth' => '2000-05-06',
                            'nationalitie_id' => Nationalitie::inRandomOrder()->first()->id,
                            'blood_type_id' => BloodType::inRandomOrder()->first()->id,
                        ]);
                    }
                }
            }
        }
    }
}
