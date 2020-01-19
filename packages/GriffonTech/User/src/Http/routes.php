<?php


Route::group(['middleware' => ['web']], function(){

    //Store front home
    Route::get('/', 'GriffonTech\Shop\Http\Controllers\HomeController@index')->defaults('_config', [
        'view' => 'user::home.index'
    ])->name('user.home.index');


    Route::prefix('user')->group(function() {

        Route::get('/forgot-password', 'GriffonTech\User\Http\Controllers\ForgotPasswordController@create')->defaults('_config', [
            'view' => 'shop::user.signup.forgot-password'
        ])->name('user.forgot-password.create');

        // Forgot Password Form Store
        Route::post('/forgot-password', 'Webkul\Customer\Http\Controllers\ForgotPasswordController@store')->name('customer.forgot-password.store');

        // Reset Password Form Show
        Route::get('/reset-password/{token}', 'Webkul\Customer\Http\Controllers\ResetPasswordController@create')->defaults('_config', [
            'view' => 'shop::customers.signup.reset-password'
        ])->name('customer.reset-password.create');

        // Reset Password Form Store
        Route::post('/reset-password', 'Webkul\Customer\Http\Controllers\ResetPasswordController@store')->defaults('_config', [
            'redirect' => 'customer.profile.index'
        ])->name('customer.reset-password.store');

        // Login Routes
        // Login form show
        Route::get('login', 'GriffonTech\User\Http\Controllers\SessionController@show')->defaults('_config', [
            'view' => 'user::users.session.index',
        ])->name('user.session.index');

        // Login form store
        Route::post('login', 'GriffonTech\User\Http\Controllers\SessionController@create')->defaults('_config', [
            'redirect' => 'user.profile.index'
        ])->name('user.session.create');

        // Registration Routes
        //registration form show
        Route::get('register', 'GriffonTech\User\Http\Controllers\RegistrationController@show')->defaults('_config', [
            'view' => 'user::users.signup.index'
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
                    'view' => 'user::users.account.index'
                ])->name('user.account.index');

                //Customer Profile Show
                Route::get('profile', 'GriffonTech\User\Http\Controllers\CustomerController@index')->defaults('_config', [
                    'view' => 'shop::customers.account.profile.index'
                ])->name('user.profile.index');

                //Customer Profile Edit Form Show
                Route::get('profile/edit', 'GriffonTech\User\Http\Controllers\CustomerController@edit')->defaults('_config', [
                    'view' => 'user::users.account.profile.edit'
                ])->name('user.profile.edit');

                //Customer Profile Edit Form Store
                Route::post('profile/edit', 'GriffonTech\User\Http\Controllers\CustomerController@update')->defaults('_config', [
                    'redirect' => 'user.profile.index'
                ])->name('user.profile.edit');

                //Customer Profile Delete Form Store
                Route::post('profile/destroy', 'GriffonTech\User\Http\Controllers\CustomerController@destroy')->defaults('_config', [
                    'redirect' => 'user.profile.index'
                ])->name('user.profile.destroy');
            });
        });
    });

});