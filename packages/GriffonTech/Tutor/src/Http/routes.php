<?php

Route::group(['middleware' => ['web']], function() {

    Route::prefix('tutor')->group(function(){

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


        // tutor Reviews
        Route::get('reviews', 'GriffonTech\Tutor\Http\Controllers\ReviewController@index')->defaults('_config', [
            'view' => 'tutor::tutor.review.index',
        ])->name('tutor.review.index');
    });

});