<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToTutorDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->foreign('tutor_id')
                ->references('id')->on('tutor_profiles')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Schema::table('course_batches', function (Blueprint $table) {
            $table->foreign('course_id')
                ->references('id')->on('courses')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Schema::table('course_comments', function (Blueprint $table) {
            $table->foreign('course_id')
                ->references('id')->on('courses')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Schema::table('course_reviews', function (Blueprint $table) {
            $table->foreign('course_id')
                ->references('id')->on('courses')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Schema::table('course_registrations', function (Blueprint $table) {
            $table->foreign('course_id')
                ->references('id')->on('courses')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropForeign('courses_tutor_id_foreign');
        });
        Schema::table('course_batches', function (Blueprint $table) {
            $table->dropForeign('course_batches_course_id_foreign');
        });
        Schema::table('course_comments', function (Blueprint $table) {
            $table->dropForeign('course_comments_course_id_foreign');
        });
        Schema::table('course_reviews', function (Blueprint $table) {
            $table->dropForeign('course_reviews_course_id_foreign');
        });
        Schema::table('course_registrations', function (Blueprint $table) {
            $table->dropForeign('course_registrations_course_id_foreign');
        });
    }
}
