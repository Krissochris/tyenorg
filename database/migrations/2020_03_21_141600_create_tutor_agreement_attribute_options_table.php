<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutorAgreementAttributeOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutor_agreement_attribute_options', function (Blueprint $table) {
            $table->increments('id');
            $table->string('admin_name');
            $table->unsignedInteger('sort_order')->default(0);
            $table->unsignedInteger('tutor_agreement_attribute_id');
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
        Schema::dropIfExists('tutor_agreement_attribute_options');
    }
}
