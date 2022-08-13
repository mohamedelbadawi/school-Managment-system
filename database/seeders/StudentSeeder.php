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

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $grades = Grade::all();
        // $parents = StudentParent::all()->toArray();
        // $nationalities = Nationalitie::all()->toArray();
        // $bloods = BloodType::all()->toArray();
        foreach ($grades as $grade) {
            foreach ($grade->levels as $level) {
                foreach ($level->classrooms as $classroom) {
                    for ($i = 0; $i < 10; $i++) {
                        Student::create([
                            'name' => $faker->name,
                            'email' => $faker->unique()->safeEmail,
                            'password' => bcrypt('123456789'),
                            'gender_id' => Gender::inRandomOrder()->first()->id,
                            'level_id' => $level->id,
                            'grade_id' => $grade->id,
                            'class_room_id' => $classroom->id,
                            'student_parent_id' => StudentParent::inRandomOrder()->first()->id,
                            'date_birth' => $faker->dateTime,
                            'nationalitie_id' => Nationalitie::inRandomOrder()->first()->id,
                            'blood_type_id' => BloodType::inRandomOrder()->first()->id,
                        ]);
                    }
                }
            }
        }
    }
}
