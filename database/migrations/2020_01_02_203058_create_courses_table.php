<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('url_key');
            $table->string('description')->nullable();
            $table->integer('course_category_id')->unsigned();
            $table->integer('tutor_id')->unsigned();
            $table->integer('total_no_of_users_in_batch')->unsigned();
            $table->integer('total_no_of_referrals_needed')->unsigned();
            $table->decimal('price', 8, 2);
            $table->string('photo')->nullable();
            $table->string('video_url')->nullable();
            $table->string('status')->default(1);
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
        Schema::dropIfExists('courses');
    }
}
