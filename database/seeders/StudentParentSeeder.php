<?php

namespace Database\Seeders;

use App\Models\Nationalitie;
use App\Models\Religion;
use App\Models\StudentParent;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentParentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('student_parents')->delete();
        StudentParent::create([
            'email' => 'parent@gmail.com',
            'password' => bcrypt('123456789'),
            'father_name' => 'Mohamed Reda',
            'father_national_id' => '123456789',
            'father_job' => 'Doctor',
            'father_nationality_id' => Nationalitie::inRandomOrder()->first()->id,
            'father_religion_id' => Religion::inRandomOrder()->first()->id,
            'father_address' => 'Modausidhasu',
            'father_phone' => '01023166866',
            // mother data
            'mom_name' => 'lorem',
            'mom_national_id' => '1234565789',
            'mom_job' => 'doctor',
            'mom_nationality_id' => Nationalitie::inRandomOrder()->first()->id,
            'mom_religion_id' => Religion::inRandomOrder()->first()->id,
            'mom_phone' => '105678912',
            'mom_address' => 'fasf asfasfsafa',

        ]);
    }
}
