<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutorAgreementAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutor_agreement_attributes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('admin_name');
            $table->string('type');
            $table->string('validation')->nullable();
            $table->unsignedInteger('position')->nullable();
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
        Schema::dropIfExists('tutor_agreement_attributes');
    }
}
