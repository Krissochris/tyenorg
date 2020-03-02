<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutorCourses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutor_courses', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tutor_id');
            $table->string('course_name', 100);
            $table->string('course_experience_and_qualification')->nullable();
            $table->unsignedInteger('how_well_can_u_tutor_course')->nullable()->default(1);
            $table->unsignedInteger('how_much_would_you_charge_per_student')->nullable()->default(0);
            $table->boolean('would_you_be_willing_to_repeat_a_batch')->nullable()->default(0);
            $table->boolean('do_you_agree_to_carry_student_along_after_batch_ends')->nullable()->default(0);
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
        Schema::dropIfExists('tutor_courses');
    }
}
