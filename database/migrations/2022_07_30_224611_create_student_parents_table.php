<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Extension\Table\Table;

class CreateStudentParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_parents', function (Blueprint $table) {
            $table->id();

            $table->string('email');
            $table->string('password');
            // father data
            $table->string('father_name');
            $table->string('father_national_id');
            $table->string('father_job');
            $table->bigInteger('father_nationality_id')->unsigned();
            $table->bigInteger('father_religion_id')->unsigned();
            $table->string('father_address');
            $table->string('father_phone');


            // mother data
            $table->string('mom_name');
            $table->string('mom_national_id');
            $table->string('mom_job');
            $table->bigInteger('mom_nationality_id')->unsigned();
            $table->bigInteger('mom_religion_id')->unsigned();
            $table->string('mom_phone');
            $table->string('mom_address');




            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_parents');
    }
}
