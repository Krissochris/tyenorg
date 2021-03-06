<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutorProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutor_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('name')->nullable();
            $table->string('title')->nullable();
            $table->string('email')->nullable();
            $table->string('phone', 40)->nullable();
            $table->text('description')->nullable();
            $table->unsignedInteger('state_of_residence_id')->nullable();
            $table->string('photo')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('website_url')->nullable();
            $table->string('linkedIn_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->decimal('amount_balance', 20, 2)->default(0);
            $table->decimal('total_earned_amount', 20, 2)->default(0);
            $table->unsignedInteger('tutor_application_id')->nullable();
            $table->smallInteger('status')->default(1)
                ->comment('1 => active, -1 => blocked/deactivated');
            $table->string('bank_name')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->string('bank_account_name')->nullable();
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
        Schema::dropIfExists('tutor_profiles');
    }
}
