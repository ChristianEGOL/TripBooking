<?php

Route::group(['prefix' => '/payment', 'middleware' => 'auth'], function() {

    Route::patch('{id}/transform', '\EGOL\ReisenLizenzPayment\Controllers\PaymentController@transform');
    Route::patch('{id}/patchComment', '\EGOL\ReisenLizenzPayment\Controllers\PaymentController@patchComment');
    Route::patch('{id}/customer/{customer}/pay', '\EGOL\ReisenLizenzPayment\Controllers\CustomerController@patchCustomerPayed');

    Route::resource('/', '\EGOL\ReisenLizenzPayment\Controllers\PaymentController');
    Route::resource('{id}/history', '\EGOL\ReisenLizenzPayment\Controllers\PaymentHistoryController');
    Route::resource('{id}/reminder', '\EGOL\ReisenLizenzPayment\Controllers\PaymentReminderController');

});

