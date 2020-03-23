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
            $table->integer('tutor_id')->unsigned();
            $table->string('name');
            $table->string('url_key');
            $table->string('summary');
            $table->string('learning_url')->nullable();
            $table->string('learning_url_2')->nullable();
            $table->decimal('amount_per_student', 4, 2)->nullable();
            $table->text('description')->nullable();
            $table->integer('course_category_id')->unsigned();
            $table->integer('total_no_of_users_in_batch')->unsigned();
            $table->integer('total_no_of_referrals_needed')->unsigned()->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->string('photo')->nullable();
            $table->string('video_url')->nullable();
            $table->string('type', 30);
            $table->tinyInteger('status')->default(0)
                ->comment('-1 => paused 0=>draft 1 => completed');
            $table->dateTime('approved_on')->nullable();
            $table->boolean('active')->default(0);
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
