<?php

namespace Database\Seeders;

use App\Models\Gender;
use App\Models\Specialization;
use App\Models\Teacher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teachers')->delete();
        Teacher::create([

            'email' => 'teacher@gmail.com',
            'password' => bcrypt('123456789'),
            'name' => 'teacher',
            'specialization_id' => Specialization::inRandomOrder()->first()->id,
            'gender_id' => Gender::inRandomOrder()->first()->id,
            'joining_date' => '2020-05-06',
            'address' => 'Hurghada',

        ]);
    }
}
