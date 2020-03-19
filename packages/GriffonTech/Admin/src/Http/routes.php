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

            Route::post('users/pro_user_update/{user}', 'GriffonTech\Admin\Http\Controllers\UsersController@proUserUpdate')->defaults('_config', [
                'redirect' => 'admin.users.edit'
            ])->name('admin.users.pro_user_update');

            Route::post('users/update_payment_detail/{id}', 'GriffonTech\Admin\Http\Controllers\UsersController@updatePaymentDetail')->defaults('_config', [
                'redirect' => 'admin.users.edit'
            ])->name('admin.users.update_payment_detail');



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


            Route::post('tutors/deactivate/{id}', 'GriffonTech\Admin\Http\Controllers\TutorsController@changeTutorProfileStatus')->defaults('_config', [
                'redirect' => 'admin.tutors.index'
            ])->name('admin.tutors.deactivate');


            // Tutor Withdrawals
            Route::get('tutor_withdrawals/index', 'GriffonTech\Admin\Http\Controllers\TutorWithdrawalsController@index')->defaults('_config', [
                'view' => 'admin::admin.tutor_withdrawals.index'
            ])->name('admin.tutor_withdrawals.index');


            Route::get('tutor_withdrawals/edit/{id}', 'GriffonTech\Admin\Http\Controllers\TutorWithdrawalsController@edit')->defaults('_config', [
                'view' => 'admin::admin.tutor_withdrawals.edit'
            ])->name('admin.tutor_withdrawals.edit');


            Route::post('tutor_withdrawals/edit/{id}', 'GriffonTech\Admin\Http\Controllers\TutorWithdrawalsController@update')->defaults('_config', [
                'redirect' => 'admin.tutor_withdrawals.index'
            ])->name('admin.tutor_withdrawals.edit');



            // User Withdrawal
            Route::get('user_withdrawals/index', 'GriffonTech\Admin\Http\Controllers\UserWithdrawalsController@index')->defaults('_config', [
                'view' => 'admin::admin.user_withdrawals.index'
            ])->name('admin.user_withdrawals.index');

            Route::get('user_withdrawals/edit/{id}', 'GriffonTech\Admin\Http\Controllers\UserWithdrawalsController@edit')->defaults('_config', [
                'view' => 'admin::admin.user_withdrawals.edit'
            ])->name('admin.user_withdrawals.edit');

            Route::post('user_withdrawals/edit/{id}', 'GriffonTech\Admin\Http\Controllers\UserWithdrawalsController@update')->defaults('_config', [
                'redirect' => 'admin.user_withdrawals.index'
            ])->name('admin.user_withdrawals.edit');



            // Tutor Application Submission
            Route::get('tutor_application_submissions/index', 'GriffonTech\Admin\Http\Controllers\TutorApplicationSubmissionsController@index')->defaults('_config', [
                'view' => 'admin::admin.tutor_application_submissions.index'
            ])->name('admin.tutor_application_submissions.index');

            Route::get('tutor_application_submissions/show/{id}', 'GriffonTech\Admin\Http\Controllers\TutorApplicationSubmissionsController@show')->defaults('_config', [
                'view' => 'admin::admin.tutor_application_submissions.show'
            ])->name('admin.tutor_application_submissions.show');

            Route::post('tutor_application_submissions/approve/{id}', 'GriffonTech\Admin\Http\Controllers\TutorApplicationSubmissionsController@approve')->defaults('_config', [
                'redirect' => 'admin.tutor_application_submissions.index'
            ])->name('admin.tutor_application_submissions.approve');

            Route::post('tutor_application_submissions/reject/{id}', 'GriffonTech\Admin\Http\Controllers\TutorApplicationSubmissionsController@reject')->defaults('_config', [
                'redirect' => 'admin.tutor_application_submissions.index'
            ])->name('admin.tutor_application_submissions.reject');

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


            Route::delete('courses/delete/{id}', 'GriffonTech\Admin\Http\Controllers\CoursesController@destroy')->defaults('_config', [
                'redirect' => 'admin.courses.index'
            ])->name('admin.courses.delete');


            // Course Batches
            Route::get('course_batches/index', 'GriffonTech\Admin\Http\Controllers\CourseBatchesController@index')->defaults('_config', [
                'view' => 'admin::admin.course_batches.index'
            ])->name('admin.course_batches.index');

            Route::get('course_batches/create', 'GriffonTech\Admin\Http\Controllers\CourseBatchesController@create')->defaults('_config', [
                'view' => 'admin::admin.course_batches.create'
            ])->name('admin.course_batches.create');

            Route::post('course_batches/create', 'GriffonTech\Admin\Http\Controllers\CourseBatchesController@store')->defaults('_config', [
                'redirect' => 'admin.course_batches.index'
            ])->name('admin.course_batches.create');


            Route::get('course_batches/show/{id}', 'GriffonTech\Admin\Http\Controllers\CourseBatchesController@show')->defaults('_config', [
                'view' => 'admin::admin.course_batches.show'
            ])->name('admin.course_batches.show');


            Route::get('course_batches/edit/{id}', 'GriffonTech\Admin\Http\Controllers\CourseBatchesController@edit')->defaults('_config', [
                'view' => 'admin::admin.course_batches.edit'
            ])->name('admin.course_batches.edit');


            Route::post('course_batches/edit/{id}', 'GriffonTech\Admin\Http\Controllers\CourseBatchesController@update')->defaults('_config', [
                'redirect' => 'admin.course_batches.index'
            ])->name('admin.course_batches.edit');


            Route::delete('course_batches/delete/{id}', 'GriffonTech\Admin\Http\Controllers\CourseBatchesController@destroy')->defaults('_config', [
                'redirect' => 'admin.course_batches.index'
            ])->name('admin.course_batches.delete');

            Route::get('course_batches/pay_tutor/{id}', 'GriffonTech\Admin\Http\Controllers\CourseBatchesController@payTutor')->defaults('_config', [
                'view' => 'admin::admin.course_batches.pay_tutor'
            ])->name('admin.course_batches.pay_tutor');

            Route::post('course_batches/pay_tutor/{id}', 'GriffonTech\Admin\Http\Controllers\CourseBatchesController@processPayTutor')->defaults('_config', [
                'redirect' => 'admin.course_batches.index'
            ])->name('admin.course_batches.pay_tutor');







            //Course Registrations
            Route::get('course_registrations/index', 'GriffonTech\Admin\Http\Controllers\CourseRegistrationsController@index')->defaults('_config', [
                'view' => 'admin::admin.course_registrations.index'
            ])->name('admin.course_registrations.index');



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

            Route::delete('blogs/delete/{id}', 'GriffonTech\Blog\Http\Controllers\BlogController@destroy')->defaults('_config', [
                'redirect' => 'admin.blogs.index'
            ])->name('admin.blogs.delete');



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
            Route::get('reviews/index', 'GriffonTech\Course\Http\Controllers\ReviewsController@index')->defaults('_config', [
                'view' => 'admin::admin.reviews.index'
            ])->name('admin.reviews.index');

            Route::get('reviews/create', 'GriffonTech\Course\Http\Controllers\ReviewsController@create')->defaults('_config', [
                'view' => 'admin::admin.reviews.create'
            ])->name('admin.reviews.create');

            Route::post('reviews/create', 'GriffonTech\Course\Http\Controllers\ReviewsController@store')->defaults('_config', [
                'redirect' => 'admin.reviews.index'
            ])->name('admin.reviews.create');

            Route::get('reviews/edit/{id}', 'GriffonTech\Course\Http\Controllers\ReviewsController@edit')->defaults('_config', [
                'view' => 'admin::admin.reviews.edit'
            ])->name('admin.reviews.edit');

            Route::post('reviews/edit/{id}', 'GriffonTech\Course\Http\Controllers\ReviewsController@update')->defaults('_config', [
                'redirect' => 'admin.reviews.edit'
            ])->name('admin.reviews.edit');

            Route::get('reviews/show', 'GriffonTech\Admin\Http\Controllers\ReviewsController@show')->defaults('_config', [
                'view' => 'admin::admin.reviews.show'
            ])->name('admin.reviews.show');

            Route::get('reviews/get_course_batches/{id}', 'GriffonTech\Course\Http\Controllers\ReviewsController@getCourseBatches')->defaults('_config', [
                'view' => 'admin::admin.reviews.course_batches'
            ])->name('admin.reviews.get_course_batches');


            // Testimonies
            Route::get('testimonies/index', 'GriffonTech\Testimony\Http\Controllers\TestimoniesController@index')->defaults('_config', [
                'view' => 'admin::admin.testimonies.index'
            ])->name('admin.testimonies.index');

            Route::get('testimonies/create', 'GriffonTech\Testimony\Http\Controllers\TestimoniesController@create')->defaults('_config', [
                'view' => 'admin::admin.testimonies.create'
            ])->name('admin.testimonies.create');

            Route::post('testimonies/create', 'GriffonTech\Testimony\Http\Controllers\TestimoniesController@store')->defaults('_config', [
                'redirect' => 'admin.testimonies.index'
            ])->name('admin.testimonies.create');

            Route::get('testimonies/edit/{id}', 'GriffonTech\Testimony\Http\Controllers\TestimoniesController@edit')->defaults('_config', [
                'view' => 'admin::admin.testimonies.edit'
            ])->name('admin.testimonies.edit');

            Route::post('testimonies/edit/{id}', 'GriffonTech\Testimony\Http\Controllers\TestimoniesController@update')->defaults('_config', [
                'redirect' => 'admin.testimonies.index'
            ])->name('admin.testimonies.edit');

            Route::delete('testimonies/delete/{id}', 'GriffonTech\Testimony\Http\Controllers\TestimoniesController@destroy')->defaults('_config', [
                'redirect' => 'admin.testimonies.index'
            ])->name('admin.testimonies.delete');


            // Frequently Asked Questions
            Route::get('faqs/index', 'GriffonTech\Faq\Http\Controllers\FaqsController@index')->defaults('_config', [
                'view' => 'admin::admin.faqs.index'
            ])->name('admin.faqs.index');

            Route::get('faqs/create', 'GriffonTech\Faq\Http\Controllers\FaqsController@create')->defaults('_config', [
                'view' => 'admin::admin.faqs.create'
            ])->name('admin.faqs.create');

            Route::post('faqs/create', 'GriffonTech\Faq\Http\Controllers\FaqsController@store')->defaults('_config', [
                'redirect' => 'admin.faqs.create'
            ])->name('admin.faqs.create');

            Route::get('faqs/edit/{id}', 'GriffonTech\Faq\Http\Controllers\FaqsController@edit')->defaults('_config', [
                'view' => 'admin::admin.faqs.edit'
            ])->name('admin.faqs.edit');

            Route::post('faqs/edit/{id}', 'GriffonTech\Faq\Http\Controllers\FaqsController@update')->defaults('_config', [
                'redirect' => 'admin.faqs.index'
            ])->name('admin.faqs.edit');

            Route::delete('faqs/delete/{id}', 'GriffonTech\Faq\Http\Controllers\FaqsController@destroy')->defaults('_config', [
                'redirect' => 'admin.faqs.index'
            ])->name('admin.faqs.delete');


            // Site Settings
            Route::get('site_settings/index', 'GriffonTech\Admin\Http\Controllers\SiteSettingsController@index')->defaults('_config', [
                'view' => 'admin::admin.site_settings.index'
            ])->name('admin.site_settings.index');


            Route::post('site_settings/store', 'GriffonTech\Admin\Http\Controllers\SiteSettingsController@store')->defaults('_config', [
                'redirect' => 'admin.site_settings.index'
            ])->name('admin.site_settings.update');

            // Pages
            Route::get('pages/index', 'GriffonTech\Admin\Http\Controllers\PagesController@index')->defaults('_config', [
                'view' => 'admin::admin.pages.index'
            ])->name('admin.pages.index');

            Route::get('pages/edit/{page}', 'GriffonTech\Admin\Http\Controllers\PagesController@edit')->defaults('_config', [
                'view' => 'admin::admin.pages.edit'
            ])->name('admin.pages.edit');

            Route::post('pages/edit/{page}', 'GriffonTech\Admin\Http\Controllers\PagesController@update')->defaults('_config', [
                'redirect' => 'admin.pages.index'
            ])->name('admin.pages.update');

            Route::get('pages/show/{page}', 'GriffonTech\Admin\Http\Controllers\PagesController@show')->defaults('_config', [
                'view' => 'admin::admin.pages.view'
            ])->name('admin.pages.view');



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
