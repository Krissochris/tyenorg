<?php


Route::group(['middleware' => ['web']], function() {

    Route::prefix('courses')->group(function(){

        Route::get('/', 'GriffonTech\Shop\Http\Controllers\CourseController@index')->defaults('_config', [
            'view' => 'shop::courses.index',
        ])->name('courses.index');

        Route::get('show/{slug}', 'GriffonTech\Shop\Http\Controllers\CourseController@show')->defaults('_config', [
            'view' => 'shop::courses.show',
        ])->name('courses.show');


        Route::group(['middleware' => 'user'], function() {
            Route::get('join/{slug}', 'GriffonTech\Shop\Http\Controllers\CourseController@join')->defaults('_config', [
                'view' => 'shop::courses.show',
            ])->name('courses.join');

            Route::get('checkout/{slug}', 'GriffonTech\Shop\Http\Controllers\CourseController@checkout')->defaults('_config', [
                'view' => 'shop::courses.checkout',
            ])->name('courses.checkout');

        });


    });


    Route::get('category/{slug}', 'GriffonTech\Shop\Http\Controllers\CourseCategoryController@show')->defaults('_config', [
        'view' => 'shop::course_category.show',
    ])->name('categories.show');


});
