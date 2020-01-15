<?php

Route::group(['middleware' => ['web']], function (){
    Route::prefix('admin')->group(function() {

        // Admin Log In
        Route::get('login', 'GriffonTech\Admin\Http\Controllers\SessionController@create')->defaults('_config', [
            'view' => 'admin::admin.session.create'
        ])->name('admin.session.create');

        Route::post('login', 'GriffonTech\Admin\Http\Controllers\SessionController@store')->defaults('_config', [
            'redirect' => 'admin.dashboard.index'
        ])->name('admin.session.store');

        // Forget Password Routes
        Route::get('/forget-password', 'Webkul\User\Http\Controllers\ForgetPasswordController@create')->defaults('_config', [
            'view' => 'admin::users.forget-password.create'
        ])->name('admin.forget-password.create');
        Route::post('/forget-password', 'Webkul\User\Http\Controllers\ForgetPasswordController@store')->name('admin.forget-password.store');
        // Reset Password Routes
        Route::get('/reset-password/{token}', 'Webkul\User\Http\Controllers\ResetPasswordController@create')->defaults('_config', [
            'view' => 'admin::users.reset-password.create'
        ])->name('admin.reset-password.create');
        Route::post('/reset-password', 'Webkul\User\Http\Controllers\ResetPasswordController@store')->defaults('_config', [
            'redirect' => 'admin.dashboard.index'
        ])->name('admin.reset-password.store');


        Route::group(['middleware' => ['admin']], function() {

            Route::get('/logout', 'GriffonTech\Admin\Http\Controllers\SessionController@destroy')->defaults('_config', [
                'redirect' => 'admin.session.create'
            ])->name('admin.session.destroy');

            // Admin Dashboard
            Route::get('dashboard', 'GriffonTech\Admin\Http\Controllers\DashboardController@index')->defaults('_config', [
                'view' => 'admin::admin.dashboard.index'
            ])->name('admin.dashboard.index');

            // Users
            Route::get('users/index', 'GriffonTech\Admin\Http\Controllers\UsersController@index')->defaults('_config', [
                'view' => 'admin::admin.users.index'
            ])->name('admin.users.index');

            Route::get('users/create', 'GriffonTech\Admin\Http\Controllers\UsersController@create')->defaults('_config', [
                'view' => 'admin::admin.users.create'
            ])->name('admin.users.create');

            Route::post('users/create', 'GriffonTech\Admin\Http\Controllers\UsersController@store')->defaults('_config', [
                'redirect' => 'admin.users.index'
            ])->name('admin.users.create');

            Route::get('users/edit/{user}', 'GriffonTech\Admin\Http\Controllers\UsersController@edit')->defaults('_config', [
                'view' => 'admin::admin.users.edit'
            ])->name('admin.users.edit');

            Route::post('users/edit/{user}', 'GriffonTech\Admin\Http\Controllers\UsersController@update')->defaults('_config', [
                'redirect' => 'admin.users.edit'
            ])->name('admin.users.edit');

            Route::get('users/show/{user}', 'GriffonTech\Admin\Http\Controllers\UsersController@show')->defaults('_config', [
                'view' => 'admin::admin.users.show'
            ])->name('admin.users.show');


            // Tutors
            Route::get('tutors/index', 'GriffonTech\Admin\Http\Controllers\TutorsController@index')->defaults('_config', [
                'view' => 'admin::admin.tutors.index'
            ])->name('admin.tutors.index');

            Route::get('tutors/create', 'GriffonTech\Admin\Http\Controllers\TutorsController@create')->defaults('_config', [
                'view' => 'admin::admin.tutors.create'
            ])->name('admin.tutors.create');

            Route::post('tutors/create', 'GriffonTech\Admin\Http\Controllers\TutorsController@store')->defaults('_config', [
                'redirect' => 'admin.tutors.index'
            ])->name('admin.tutors.create');

            Route::get('tutors/edit/{id}', 'GriffonTech\Admin\Http\Controllers\TutorsController@edit')->defaults('_config', [
                'view' => 'admin::admin.tutors.edit'
            ])->name('admin.tutors.edit');

            Route::post('tutors/edit/{id}', 'GriffonTech\Admin\Http\Controllers\TutorsController@update')->defaults('_config', [
                'redirect' => 'admin.tutors.edit'
            ])->name('admin.tutors.edit');

            Route::get('tutors/show/{id}', 'GriffonTech\Admin\Http\Controllers\TutorsController@show')->defaults('_config', [
                'view' => 'admin::admin.tutors.show'
            ])->name('admin.tutors.show');


            // Admins
            Route::get('admins/index', 'GriffonTech\Admin\Http\Controllers\AdminsController@index')->defaults('_config', [
                'view' => 'admin::admin.admins.index'
            ])->name('admin.admins.index');

            Route::get('admins/create', 'GriffonTech\Admin\Http\Controllers\AdminsController@create')->defaults('_config', [
                'view' => 'admin::admin.admins.create'
            ])->name('admin.admins.create');

            Route::post('admins/create', 'GriffonTech\Admin\Http\Controllers\AdminsController@store')->defaults('_config', [
                'redirect' => 'admin.admins.index'
            ])->name('admin.admins.create');

            Route::get('admins/edit/{id}', 'GriffonTech\Admin\Http\Controllers\AdminsController@edit')->defaults('_config', [
                'view' => 'admin::admin.admins.edit'
            ])->name('admin.admins.edit');

            Route::post('admins/edit/{id}', 'GriffonTech\Admin\Http\Controllers\AdminsController@update')->defaults('_config', [
                'redirect' => 'admin.admins.edit'
            ])->name('admin.admins.edit');

            Route::get('admins/show/{id}', 'GriffonTech\Admin\Http\Controllers\AdminsController@show')->defaults('_config', [
                'view' => 'admin::admin.admins.show'
            ])->name('admin.admins.show');


            // Course Categories
            Route::get('categories/index', 'GriffonTech\Admin\Http\Controllers\CategoriesController@index')->defaults('_config', [
                'view' => 'admin::admin.categories.index'
            ])->name('admin.categories.index');


            Route::get('categories/create', 'GriffonTech\Admin\Http\Controllers\CategoriesController@create')->defaults('_config', [
                'view' => 'admin::admin.categories.create'
            ])->name('admin.categories.create');


            Route::post('categories/create', 'GriffonTech\Admin\Http\Controllers\CategoriesController@store')->defaults('_config', [
                'redirect' => 'admin.categories.index'
            ])->name('admin.categories.create');


            Route::get('categories/edit/{id}', 'GriffonTech\Admin\Http\Controllers\CategoriesController@edit')->defaults('_config', [
                'view' => 'admin::admin.categories.edit'
            ])->name('admin.categories.edit');


            Route::post('categories/edit/{id}', 'GriffonTech\Admin\Http\Controllers\CategoriesController@update')->defaults('_config', [
                'redirect' => 'admin.categories.edit'
            ])->name('admin.categories.edit');


            Route::get('categories/show/{id}', 'GriffonTech\Admin\Http\Controllers\CategoriesController@show')->defaults('_config', [
                'view' => 'admin::admin.categories.show'
            ])->name('admin.categories.show');

            Route::delete('categories/delete/{id}', 'GriffonTech\Admin\Http\Controllers\CategoriesController@destroy')->defaults('_config', [
                'redirect' => 'admin.categories.index'
            ])->name('admin.categories.delete');



            // Courses
            Route::get('courses/index', 'GriffonTech\Admin\Http\Controllers\CoursesController@index')->defaults('_config', [
                'view' => 'admin::admin.courses.index'
            ])->name('admin.courses.index');


            Route::get('courses/create', 'GriffonTech\Admin\Http\Controllers\CoursesController@create')->defaults('_config', [
                'view' => 'admin::admin.courses.create'
            ])->name('admin.courses.create');

            Route::post('courses/create', 'GriffonTech\Admin\Http\Controllers\CoursesController@store')->defaults('_config', [
                'redirect' => 'admin.courses.index'
            ])->name('admin.courses.create');

            Route::get('courses/edit/{id}', 'GriffonTech\Admin\Http\Controllers\CoursesController@edit')->defaults('_config', [
                'view' => 'admin::admin.courses.edit'
            ])->name('admin.courses.edit');

            Route::post('courses/edit/{id}', 'GriffonTech\Admin\Http\Controllers\CoursesController@update')->defaults('_config', [
                'redirect' => 'admin.courses.edit'
            ])->name('admin.courses.edit');

            Route::get('courses/show/{id}', 'GriffonTech\Admin\Http\Controllers\CoursesController@show')->defaults('_config', [
                'view' => 'admin::admin.courses.show'
            ])->name('admin.courses.show');

            Route::get('courses/delete/{id}', 'GriffonTech\Admin\Http\Controllers\CoursesController@destroy')->defaults('_config', [
                'redirect' => 'admin.courses.index'
            ])->name('admin.courses.delete');


            // Blogs
            Route::get('blogs/index', 'GriffonTech\Blog\Http\Controllers\BlogController@index')->defaults('_config', [
                'view' => 'admin::admin.blogs.index'
            ])->name('admin.blogs.index');

            Route::get('blogs/create', 'GriffonTech\Blog\Http\Controllers\BlogController@create')->defaults('_config', [
                'view' => 'admin::admin.blogs.create'
            ])->name('admin.blogs.create');

            Route::post('blogs/create', 'GriffonTech\Blog\Http\Controllers\BlogController@store')->defaults('_config', [
                'redirect' => 'admin.blogs.index'
            ])->name('admin.blogs.create');

            Route::get('blogs/edit/{id}', 'GriffonTech\Blog\Http\Controllers\BlogController@edit')->defaults('_config', [
                'view' => 'admin::admin.blogs.edit'
            ])->name('admin.blogs.edit');

            Route::post('blogs/edit/{id}', 'GriffonTech\Blog\Http\Controllers\BlogController@update')->defaults('_config', [
                'redirect' => 'admin.blogs.edit'
            ])->name('admin.blogs.show');

            Route::get('blogs/show/{id}', 'GriffonTech\Blog\Http\Controllers\BlogController@show')->defaults('_config', [
                'view' => 'admin::admin.blogs.show'
            ])->name('admin.blogs.show');


            // Blog Comments
            Route::get('blogs/comments/index', 'GriffonTech\Blog\Http\Controllers\BlogCommentController@index')->defaults('_config', [
                'view' => 'admin::admin.blogs.comments.index'
            ])->name('admin.blogs.comments.index');

            Route::get('blogs/comments/create', 'GriffonTech\Blog\Http\Controllers\BlogCommentController@create')->defaults('_config', [
                'view' => 'admin::admin.blogs.comments.create'
            ])->name('admin.blogs.comments.create');

            Route::post('blogs/comments/create', 'GriffonTech\Blog\Http\Controllers\BlogCommentController@store')->defaults('_config', [
                'redirect' => 'admin.blogs.index'
            ])->name('admin.blogs.comments.create');

            Route::get('blogs/comments/edit/{id}', 'GriffonTech\Blog\Http\Controllers\BlogCommentController@edit')->defaults('_config', [
                'view' => 'admin::admin.blogs.comments.edit'
            ])->name('admin.blogs.comments.edit');

            Route::post('blogs/comments/edit/{id}', 'GriffonTech\Blog\Http\Controllers\BlogCommentController@update')->defaults('_config', [
                'redirect' => 'admin.blogs.comments.edit'
            ])->name('admin.blogs.comments.edit');

            Route::delete('blogs/comments/delete/{id}', 'GriffonTech\Blog\Http\Controllers\BlogCommentController@destroy')->defaults('_config', [
                'redirect' => 'admin.blogs.comments.index'
            ])->name('admin.blogs.comments.delete');




            // Reviews
            Route::get('reviews/index', 'GriffonTech\Admin\Http\Controllers\ReviewsController@index')->defaults('_config', [
                'view' => 'admin::admin.reviews.index'
            ])->name('admin.reviews.index');

            Route::get('reviews/create', 'GriffonTech\Admin\Http\Controllers\ReviewsController@create')->defaults('_config', [
                'view' => 'admin::admin.reviews.create'
            ])->name('admin.reviews.create');

            Route::post('reviews/create', 'GriffonTech\Admin\Http\Controllers\ReviewsController@store')->defaults('_config', [
                'redirect' => 'admin.reviews.index'
            ])->name('admin.reviews.create');

            Route::get('reviews/edit', 'GriffonTech\Admin\Http\Controllers\ReviewsController@edit')->defaults('_config', [
                'view' => 'admin::admin.reviews.edit'
            ])->name('admin.reviews.edit');

            Route::post('reviews/edit', 'GriffonTech\Admin\Http\Controllers\ReviewsController@update')->defaults('_config', [
                'redirect' => 'admin.reviews.index'
            ])->name('admin.reviews.show');

            Route::get('reviews/show', 'GriffonTech\Admin\Http\Controllers\ReviewsController@show')->defaults('_config', [
                'view' => 'admin::admin.reviews.show'
            ])->name('admin.reviews.show');


            // Messages
            Route::get('messages/index', 'GriffonTech\Admin\Http\Controllers\MessagesController@index')->defaults('_config', [
                'view' => 'admin::admin.messages.index'
            ])->name('admin.messages.index');

            Route::get('messages/create', 'GriffonTech\Admin\Http\Controllers\MessagesController@create')->defaults('_config', [
                'view' => 'admin::admin.messages.create'
            ])->name('admin.messages.create');

            Route::post('messages/create', 'GriffonTech\Admin\Http\Controllers\MessagesController@store')->defaults('_config', [
                'redirect' => 'admin.messages.index'
            ])->name('admin.messages.create');

            Route::get('messages/edit', 'GriffonTech\Admin\Http\Controllers\MessagesController@edit')->defaults('_config', [
                'view' => 'admin::admin.messages.edit'
            ])->name('admin.messages.edit');

            Route::post('messages/edit', 'GriffonTech\Admin\Http\Controllers\MessagesController@update')->defaults('_config', [
                'redirect' => 'admin.messages.index'
            ])->name('admin.messages.show');

            Route::get('messages/show', 'GriffonTech\Admin\Http\Controllers\MessagesController@show')->defaults('_config', [
                'view' => 'admin::admin.messages.show'
            ])->name('admin.messages.show');
        });

    });
});
