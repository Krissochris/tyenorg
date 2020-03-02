<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone_number', 15)->nullable();
            $table->string('photo')->nullable();
            $table->boolean('is_pro_user')->default(0);
            $table->tinyInteger('status')->default(1)->comment('The user login status 1 => active , 0 => inactive');
            $table->boolean('subscribed_to_news_letter')->default(0);
            $table->boolean('is_verified')->default(0);
            $table->string('token')->nullable();
            $table->text('notes')->nullable();
            $table->unsignedInteger('tutor_id')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
