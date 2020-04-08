<?php

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('coupon_system')->group(function() {

    Route::post('verify', 'GriffonTech\CouponSystem\Http\Controllers\CouponSystemController@verify');

});
