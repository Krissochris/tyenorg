<?php

Route::group(['middleware' => ['web']], function() {

    Route::post('/payment/process', 'GriffonTech\Shop\Http\Controllers\CheckoutController@process')->name('payment.process');

    Route::get('/payment/paypal', 'GriffonTech\Payment\Http\Controllers\PayPalPaymentController@process')->name('payment.pay_pal');

    Route::get('/payment/paypal/status', 'GriffonTech\Payment\Http\Controllers\PayPalPaymentController@getPaymentStatus')->name('payment.pay_pal.status');

    Route::get('/payment/rave_pay', 'GriffonTech\Shop\Http\Controllers\RavePaymentController@process')->name('payment.rave_pay');

    Route::post('/payment/rave_pay/status', 'GriffonTech\Shop\Http\Controllers\RavePaymentController@getPaymentStatus')->name('payment.rave_pay.status');


    Route::get('/payment/coin_payment', 'GriffonTech\Payment\Http\Controllers\CoinPaymentPaymentController@process')->name('payment.coin_payment');

    Route::post('/payment/coin_payment/status', 'GriffonTech\Payment\Http\Controllers\CoinPaymentController@getPaymentStatus')->name('payment.coin_payment.status');



    Route::get('/payment/success', function() {
        return view("shop::payment.success");
    })->name('payment.success');
});