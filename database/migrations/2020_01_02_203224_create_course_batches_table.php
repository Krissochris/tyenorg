<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseBatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_batches', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('course_id')->unsigned();
            $table->integer('tutor_id')->unsigned();
            $table->integer('no_of_users')->unsigned()->default(0);
            $table->integer('maximum_number_of_users')->unsigned();
            $table->boolean('entry_status')->unsigned()->default(1)->comment('if a batch is still open for user entry');
            $table->boolean('is_taken')->default(0)->comment('is_taken 0 = Not Taken, 1 = Taken');
            $table->timestamp('time_completed')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('paid_tutor')->default(0)->comment('0 => No, 1 => Yes');
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
        Schema::dropIfExists('course_batches');
    }
}
