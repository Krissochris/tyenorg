<?php


Route::group(['middleware' => ['web']], function() {

    Route::prefix('courses')->group(function(){

        Route::get('/', 'GriffonTech\Course\Http\Controllers\CourseController@index')->defaults('_config', [
            'view' => 'shop::courses.index',
        ])->name('courses.index');
    });

});