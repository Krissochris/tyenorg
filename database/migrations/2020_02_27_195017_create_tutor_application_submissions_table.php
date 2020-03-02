<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutorApplicationSubmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutor_application_submissions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tutor_profile_id');
            $table->smallInteger('status')->default(1)
                ->comment('1 => active, 2 => approved, -1 => cancelled');
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
        Schema::dropIfExists('tutor_application_submissions');
    }
}
