<?php

Route::get('/cron/reminder', '\EGOL\ReisenLizenzPayment\Controllers\PaymentReminderController@cronjob');

Route::group(['prefix' => '/payment', 'middleware' => 'auth'], function() {
    Route::post('search', '\EGOL\ReisenLizenzPayment\Controllers\PaymentController@postSearch');
    Route::patch('{id}/transform', '\EGOL\ReisenLizenzPayment\Controllers\PaymentController@transform');
    Route::patch('{id}/patchComment', '\EGOL\ReisenLizenzPayment\Controllers\PaymentController@patchComment');
    Route::patch('{id}/customer/{customer}/pay', '\EGOL\ReisenLizenzPayment\Controllers\CustomerController@patchCustomerPayed');
});

Route::resource('/payment', '\EGOL\ReisenLizenzPayment\Controllers\PaymentController');
Route::resource('/payment/{id}/history', '\EGOL\ReisenLizenzPayment\Controllers\PaymentHistoryController');
Route::resource('/payment/{id}/reminder', '\EGOL\ReisenLizenzPayment\Controllers\PaymentReminderController');
