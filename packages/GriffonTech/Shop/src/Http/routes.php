<?php


Route::group(['middleware' => ['web']], function(){

    //Store front home
    Route::get('/', 'GriffonTech\Shop\Http\Controllers\HomeController@index')->defaults('_config', [
        'view' => 'shop::homepage.index'
    ])->name('user.home.index');


    Route::prefix('user')->group(function() {

        Route::get('/forgot-password', 'GriffonTech\User\Http\Controllers\ForgotPasswordController@create')->defaults('_config', [
            'view' => 'shop::user.signup.forgot-password'
        ])->name('user.forgot-password.create');

        // Forgot Password Form Store
        Route::post('/forgot-password', 'GriffonTech\User\Http\Controllers\ForgotPasswordController@store')->name('customer.forgot-password.store');

        // Reset Password Form Show
        Route::get('/reset-password/{token}', 'GriffonTech\User\Http\Controllers\ResetPasswordController@create')->defaults('_config', [
            'view' => 'shop::user.signup.reset-password'
        ])->name('user.reset-password.create');

        // Reset Password Form Store
        Route::post('/reset-password', 'GriffonTech\User\Http\Controllers\ResetPasswordController@store')->defaults('_config', [
            'redirect' => 'user.profile.index'
        ])->name('user.reset-password.store');


        // Login Routes
        // Login form show
        Route::get('login', 'GriffonTech\User\Http\Controllers\SessionController@show')->defaults('_config', [
            'view' => 'shop::user.session.index',
        ])->name('user.session.index');

        // Login form store
        Route::post('login', 'GriffonTech\User\Http\Controllers\SessionController@create')->defaults('_config', [
            'redirect' => 'user.course.index'
        ])->name('user.session.create');

        // Registration Routes
        //registration form show
        Route::get('register', 'GriffonTech\User\Http\Controllers\RegistrationController@show')->defaults('_config', [
            'view' => 'shop::user.signup.index'
        ])->name('user.register.index');

        //registration form store
        Route::post('register', 'GriffonTech\User\Http\Controllers\RegistrationController@create')->defaults('_config', [
            'redirect' => 'user.session.index',
        ])->name('user.register.create');

        //verify account
        Route::get('/verify-account/{token}', 'GriffonTech\User\Http\Controllers\RegistrationController@verifyAccount')->name('user.verify');

        //resend verification email
        Route::get('/resend/verification/{email}', 'GriffonTech\User\Http\Controllers\RegistrationController@resendVerificationEmail')->name('user.resend.verification-email');


        // Auth Route
        Route::group(['middleware' => ['user']], function(){

            //Customer logout
            Route::get('logout', 'GriffonTech\User\Http\Controllers\SessionController@destroy')->defaults('_config', [
                'redirect' => 'user.session.index'
            ])->name('user.session.destroy');

            Route::get('tutor_application/create', 'GriffonTech\User\Http\Controllers\TutorApplicationController@create')->defaults('_config', [
                'view' => 'shop::user.tutor_application.create'
            ])->name('user.tutor_application.create');

            Route::get('tutor_application/create', 'GriffonTech\User\Http\Controllers\TutorApplicationController@create')->defaults('_config', [
                'view' => 'shop::user.tutor_application.create'
            ])->name('user.tutor_application.create');

            Route::post('tutor_application/create', 'GriffonTech\User\Http\Controllers\TutorApplicationController@store')->defaults('_config', [
                'redirect' => 'user.tutor_application.create'
            ])->name('user.tutor_application.create');

            Route::get('tutor_application/add_courses', 'GriffonTech\User\Http\Controllers\TutorApplicationController@addCourses')->defaults('_config', [
                'view' => 'shop::user.tutor_application.add_courses'
            ])->name('user.tutor_application.add_courses');

            Route::post('tutor_application/add_courses', 'GriffonTech\User\Http\Controllers\TutorApplicationController@processAddCourses')->defaults('_config', [
                'redirect' => 'user.tutor_application.add_courses'
            ])->name('user.tutor_application.add_courses');

            Route::delete('tutor_application/delete_course/{tutor_course_id}', 'GriffonTech\User\Http\Controllers\TutorApplicationController@deleteCourse')
                ->name('user.tutor_application.delete_course');

            Route::get('tutor_application/preview', 'GriffonTech\User\Http\Controllers\TutorApplicationController@preview')->defaults('_config', [
                'view' => 'shop::user.tutor_application.preview'
            ])->name('user.tutor_application.preview');

            Route::post('tutor_application/submit', 'GriffonTech\User\Http\Controllers\TutorApplicationController@submitApplication')->defaults('_config', [
                'redirect' => 'user.tutor_application.create'
            ])->name('user.tutor_application.submit');


            Route::get('tutor_application/get_new_course_form', 'GriffonTech\User\Http\Controllers\TutorApplicationController@getNewCourseForm')->defaults('_config', [
                'view' => 'shop::user.tutor_application.include.new_course_form'
            ])->name('user.tutor_application.new_course_form');




            Route::prefix('account')->group(function(){
                //Customer Dashboard Route
                Route::get('index', 'GriffonTech\User\Http\Controllers\AccountController@index')->defaults('_config', [
                    'view' => 'shop::user.account.index'
                ])->name('user.account.index');

                //Customer Profile Show
                Route::get('profile', 'GriffonTech\User\Http\Controllers\UserController@index')->defaults('_config', [
                    'view' => 'shop::user.account.profile.index'
                ])->name('user.profile.index');

                //Customer Profile Edit Form Show
                Route::get('profile/edit', 'GriffonTech\User\Http\Controllers\UserController@edit')->defaults('_config', [
                    'view' => 'shop::user.account.profile.edit'
                ])->name('user.profile.edit');

                //Customer Profile Edit Form Store
                Route::post('profile/edit', 'GriffonTech\User\Http\Controllers\UserController@update')->defaults('_config', [
                    'redirect' => 'user.profile.index'
                ])->name('user.profile.edit');

                //Customer Profile Delete Form Store
                Route::post('profile/destroy', 'GriffonTech\User\Http\Controllers\CustomerController@destroy')->defaults('_config', [
                    'redirect' => 'user.profile.index'
                ])->name('user.profile.destroy');

                //User Course Show
                Route::get('my-courses/learning', 'GriffonTech\User\Http\Controllers\CourseController@index')->defaults('_config', [
                    'view' => 'shop::user.account.course.index'
                ])->name('user.course.index');

                Route::get('my-courses/show/{slug}', 'GriffonTech\User\Http\Controllers\CourseController@show')->defaults('_config', [
                    'view' => 'shop::user.account.course.show'
                ])->name('user.course.show');

                Route::get('purchases', 'GriffonTech\User\Http\Controllers\PurchasesController@index')->defaults('_config', [
                    'view' => 'shop::user.account.purchases.index'
                ])->name('user.purchases.index');

                Route::get('referral', 'GriffonTech\User\Http\Controllers\ReferralController@show')->defaults('_config', [
                    'view' => 'shop::user.account.referral.show'
                ])->name('user.referral.show');


                //User Blog
                Route::get('blog/index', 'GriffonTech\User\Http\Controllers\BlogController@index')->defaults('_config', [
                    'view' => 'shop::user.account.blog.index'
                ])->name('user.blog.index');


                Route::get('blog/create', 'GriffonTech\User\Http\Controllers\BlogController@create')->defaults('_config', [
                    'view' => 'shop::user.account.blog.create'
                ])->name('user.blog.create');

                Route::post('blog/create', 'GriffonTech\User\Http\Controllers\BlogController@store')->defaults('_config', [
                    'redirect' => 'user.blog.index'
                ])->name('user.blog.create');

                Route::get('blog/edit/{slug}', 'GriffonTech\User\Http\Controllers\BlogController@edit')->defaults('_config', [
                    'view' => 'shop::user.account.blog.edit'
                ])->name('user.blog.edit');

                Route::post('blog/edit/{slug}', 'GriffonTech\User\Http\Controllers\BlogController@update')->defaults('_config', [
                    'redirect' => 'user.blog.index'
                ])->name('user.blog.edit');

                Route::delete('blog/delete/{slug}', 'GriffonTech\User\Http\Controllers\BlogController@destroy')->defaults('_config', [
                    'redirect' => 'user.blog.index'
                ])->name('user.blog.delete');


                //User Testimonies
                Route::get('testimonies/index', 'GriffonTech\User\Http\Controllers\TestimonyController@index')->defaults('_config', [
                    'view' => 'shop::user.account.testimonies.index'
                ])->name('user.testimonies.index');

                Route::post('testimonies/create', 'GriffonTech\User\Http\Controllers\TestimonyController@store')->defaults('_config', [
                    'redirect' => 'user.testimonies.index'
                ])->name('user.testimonies.create');

                Route::delete('testimonies/delete/{id}', 'GriffonTech\User\Http\Controllers\TestimonyController@destroy')->defaults('_config', [
                    'redirect' => 'user.testimonies.index'
                ])->name('user.testimonies.delete');

                // Course Review
                Route::post('course_review/create', 'GriffonTech\User\Http\Controllers\CourseReviewController@store')->defaults('_config', [
                ])->name('user.course_review.create');

                Route::post('course_review/edit/{id}', 'GriffonTech\User\Http\Controllers\CourseReviewController@update')->defaults('_config', [
                ])->name('user.course_review.edit');

                Route::delete('course_review/delete/{id}', 'GriffonTech\User\Http\Controllers\CourseReviewController@destroy')->defaults('_config', [
                ])->name('user.course_review.delete');


                Route::get('become_a_pro_user', 'GriffonTech\User\Http\Controllers\BecomeProUserController@index')->defaults('_config', [
                    'view' => 'shop::pro_user.index'
                ])->name('user.pro_user');

                Route::post('become_a_pro_user/process', 'GriffonTech\User\Http\Controllers\BecomeProUserController@create')->defaults('_config', [
                ])->name('user.pro_user.process');

            });
        });

    });

    //All Blog Show
    Route::get('blog', 'GriffonTech\Shop\Http\Controllers\BlogController@index')->defaults('_config', [
        'view' => 'shop::blogs.index'
    ])->name('blog.posts.index');

    Route::get('blog/{slug}', 'GriffonTech\Shop\Http\Controllers\BlogController@show')->defaults('_config', [
        'view' => 'shop::blogs.show'
    ])->name('blog.posts.show');

    Route::post('blog/{slug}/add-comment', 'GriffonTech\Shop\Http\Controllers\BlogController@addComment')->defaults('_config', [
        'redirect' => 'blog.posts.show'
    ])->name('blog.posts.store');

    Route::delete('blog/comment/delete/{id}', 'GriffonTech\Shop\Http\Controllers\BlogCommentController@destroy')->defaults('_config', [
    ])->name('blog.comment.delete');


    Route::get('faqs', 'GriffonTech\Shop\Http\Controllers\FaqController@index')->defaults('_config', [
        'view' => 'shop::faqs.index'
    ])->name('faqs.index');
});
