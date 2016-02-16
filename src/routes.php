<?php

Route::group(['prefix' => '/payment', 'middleware' => 'auth'], function() {

    Route::patch('{id}/transform', '\EGOL\TripBooking\Controllers\PaymentController@transform');
    Route::patch('{id}/patchComment', '\EGOL\TripBooking\Controllers\PaymentController@patchComment');
    Route::patch('{id}/customer/{customer}/pay', '\EGOL\TripBooking\Controllers\CustomerController@patchCustomerPayed');

    Route::resource('/', '\EGOL\TripBooking\Controllers\PaymentController');
    Route::resource('{id}/history', '\EGOL\TripBooking\Controllers\PaymentHistoryController');
    Route::resource('{id}/reminder', '\EGOL\TripBooking\Controllers\PaymentReminderController');

});

