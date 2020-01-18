<?php


Route::group(['middleware' => ['web']], function(){

    //Store front home
    Route::get('/', 'GriffonTech\Shop\Http\Controllers\HomeController@index')->defaults('_config', [
        'view' => 'shop::home.index'
    ])->name('user.home.index');


    Route::prefix('user')->group(function() {
        // Login Routes
        // Login form show
        Route::get('login', 'GriffonTech\User\Http\Controllers\SessionController@show')->defaults('_config', [
            'view' => 'shop::users.session.index',
        ])->name('user.session.index');

        // Login form store
        Route::post('login', 'GriffonTech\User\Http\Controllers\SessionController@create')->defaults('_config', [
            'redirect' => 'user.course.index'
        ])->name('user.session.create');

        // Registration Routes
        //registration form show
        Route::get('register', 'GriffonTech\User\Http\Controllers\RegistrationController@show')->defaults('_config', [
            'view' => 'shop::users.signup.index'
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

            Route::prefix('account')->group(function(){
                //Customer Dashboard Route
                Route::get('index', 'GriffonTech\User\Http\Controllers\AccountController@index')->defaults('_config', [
                    'view' => 'shop::users.account.index'
                ])->name('user.account.index');

                //Customer Profile Show
                Route::get('profile', 'GriffonTech\User\Http\Controllers\UserController@index')->defaults('_config', [
                    'view' => 'shop::users.account.profile.index'
                ])->name('user.profile.index');

                //Customer Profile Edit Form Show
                Route::get('profile/edit', 'GriffonTech\User\Http\Controllers\UserController@edit')->defaults('_config', [
                    'view' => 'shop::users.account.profile.edit'
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
                    'view' => 'shop::users.account.course.index'
                ])->name('user.course.index');

                Route::get('my-courses/show/{slug}', 'GriffonTech\User\Http\Controllers\CourseController@show')->defaults('_config', [
                    'view' => 'shop::users.account.course.show'
                ])->name('user.course.show');

                Route::get('purchases', 'GriffonTech\User\Http\Controllers\PurchasesController@index')->defaults('_config', [
                    'view' => 'shop::users.account.purchases.index'
                ])->name('user.purchases.index');

                Route::get('referral', 'GriffonTech\User\Http\Controllers\ReferralController@show')->defaults('_config', [
                    'view' => 'shop::users.account.referral.show'
                ])->name('user.referral.show');

            });
        });
    });

});