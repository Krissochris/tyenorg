<?php

Route::group(['middleware' => ['web', 'user']], function() {

    Route::prefix('tutor')->group(function(){

        Route::get('account_suspended', function(){
            return view("tutor::tutor.profile.account_blocked");
        })->defaults('_config', [

                'view' => 'tutor::tutor.application.create'
            ])->name('tutor.account_blocked');


        Route::group(['middleware' => ['tutor']], function() {

            Route::get('application', 'GriffonTech\Tutor\Http\Controllers\TutorApplicationsController@create')
                ->defaults('_config', [
                    'view' => 'tutor::tutor.application.create'
                ])->name('tutor.applications.create');

            Route::post('application/save', 'GriffonTech\Tutor\Http\Controllers\TutorApplicationController@save')
                ->defaults('_config', [
                    'redirect' => 'tutor.applications.create'
                ])->name('tutor.applications.save');

            Route::post('application/submit', 'GriffonTech\Tutor\Http\Controllers\TutorApplicationController@submit')
                ->defaults('_config', [
                    'redirect' => 'tutor.applications.create'
                ])->name('tutor.applications.submit');


            Route::get('courses', 'GriffonTech\Tutor\Http\Controllers\CourseController@index')->defaults('_config', [
                'view' => 'tutor::tutor.course.index',
            ])->name('tutor.courses.index');

            Route::get('courses/new', 'GriffonTech\Tutor\Http\Controllers\CourseController@create')->defaults('_config', [
                'view' => 'tutor::tutor.course.create',
            ])->name('tutor.courses.create');


            Route::post('courses/new', 'GriffonTech\Tutor\Http\Controllers\CourseController@store')->defaults('_config', [
                'redirect' => 'tutor.courses.index',
            ])->name('tutor.courses.create');


            Route::get('courses/view/{slug}', 'GriffonTech\Tutor\Http\Controllers\CourseController@show')->defaults('_config', [
                'view' => 'tutor::tutor.course.view',
            ])->name('tutor.courses.view');

            Route::get('courses/edit/{slug}', 'GriffonTech\Tutor\Http\Controllers\CourseController@edit')->defaults('_config', [
                'view' => 'tutor::tutor.course.edit',
            ])->name('tutor.courses.edit');


            Route::post('courses/edit/{slug}', 'GriffonTech\Tutor\Http\Controllers\CourseController@update')->defaults('_config', [
                'redirect' => 'tutor.courses.index',
            ])->name('tutor.courses.edit');


            Route::get('courses/show/{slug}', 'GriffonTech\Tutor\Http\Controllers\CourseController@show')->defaults('_config', [
                'view' => 'tutor::tutor.course.show',
            ])->name('tutor.courses.show');

            Route::get('courses/delete/{slug}', 'GriffonTech\Tutor\Http\Controllers\CourseController@delete')->defaults('_config', [
                'view' => 'tutor::tutor.course.delete',
            ])->name('tutor.courses.delete');

            Route::delete('courses/destroy/{slug}', 'GriffonTech\Tutor\Http\Controllers\CourseController@destroy')->defaults('_config', [
                'redirect' => 'tutor.courses.index',
            ])->name('tutor.courses.destroy');



            Route::get('courses/{course_slug}/course_batch/index', 'GriffonTech\Tutor\Http\Controllers\CourseBatchController@index')->defaults('_config', [
                'view' => 'tutor::tutor.course_batch.index',
            ])->name('tutor.courses.course_batch.index');

            Route::get('courses/{course_slug}/course_batch/create', 'GriffonTech\Tutor\Http\Controllers\CourseBatchController@create')->defaults('_config', [
                'view' => 'tutor::tutor.course_batch.create',
            ])->name('tutor.courses.course_batch.create');

            Route::post('courses/{course_slug}/course_batch/create', 'GriffonTech\Tutor\Http\Controllers\CourseBatchController@store')->defaults('_config', [
                'redirect' => 'tutor.courses.course_batch.index',
            ])->name('tutor.courses.course_batch.create');

            Route::get('courses/course_batch/edit/{id}', 'GriffonTech\Tutor\Http\Controllers\CourseBatchController@edit')->defaults('_config', [
                'view' => 'tutor::tutor.course_batch.edit',
            ])->name('tutor.courses.course_batch.edit');

            Route::post('courses/course_batch/edit/{id}', 'GriffonTech\Tutor\Http\Controllers\CourseBatchController@update')->defaults('_config', [
                'redirect' => 'tutor.courses.course_batch.edit',
            ])->name('tutor.courses.course_batch.edit');

            Route::get('courses/course_batch/show/{id}', 'GriffonTech\Tutor\Http\Controllers\CourseBatchController@show')->defaults('_config', [
                'view' => 'tutor::tutor.course_batch.show',
            ])->name('tutor.courses.course_batch.show');



            // Dashboard view
            Route::get('dashboard', 'GriffonTech\Tutor\Http\Controllers\DashboardController@index')->defaults('_config', [
                'view' => 'tutor::tutor.dashboard.index',
            ])->name('tutor.dashboard.index');


            // Tutor profile
            Route::get('profile/edit', 'GriffonTech\Tutor\Http\Controllers\TutorController@edit')->defaults('_config', [
                'view' => 'tutor::tutor.profile.edit',
            ])->name('tutor.profile.edit');


            Route::post('profile/edit', 'GriffonTech\Tutor\Http\Controllers\TutorController@update')->defaults('_config', [
                'redirect' => 'tutor.profile.edit',
            ])->name('tutor.profile.edit');


            Route::post('profile/update_payment_detail', 'GriffonTech\Tutor\Http\Controllers\TutorController@updatePaymentDetail')->defaults('_config', [
                'redirect' => 'tutor.profile.edit',
            ])->name('tutor.profile.update_payment_detail');



            // tutor Reviews
            Route::get('reviews', 'GriffonTech\Tutor\Http\Controllers\ReviewController@index')->defaults('_config', [
                'view' => 'tutor::tutor.review.index',
            ])->name('tutor.review.index');


            Route::get('withdrawals/index', 'GriffonTech\Tutor\Http\Controllers\WithdrawalController@index')->defaults('_config', [
                'view' => 'tutor::tutor.withdrawals.index',
            ])->name('tutor.withdrawals.index');


            Route::get('withdrawals/create', 'GriffonTech\Tutor\Http\Controllers\WithdrawalController@create')->defaults('_config', [
                'view' => 'tutor::tutor.withdrawals.create',
            ])->name('tutor.withdrawals.create');


            Route::post('withdrawals/create', 'GriffonTech\Tutor\Http\Controllers\WithdrawalController@store')->defaults('_config', [
                'redirect' => 'tutor.withdrawals.index',
            ])->name('tutor.withdrawals.create');

        });

    });

});
