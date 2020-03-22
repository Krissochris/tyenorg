<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutorAgreementAttributeValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutor_agreement_attribute_values', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tutor_agreement_id');
            $table->unsignedInteger('tutor_agreement_attribute_id');
            $table->text('text_value')->nullable();
            $table->unsignedTinyInteger('boolean_value')->nullable();
            $table->unsignedInteger('integer_value')->nullable();
            $table->decimal('float_value', 20, 2)->nullable();
            $table->dateTime('datetime_value')->nullable();
            $table->date('date_value')->nullable();
            //$table->json('json_value')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tutor_agreement_attribute_values');
    }
}
