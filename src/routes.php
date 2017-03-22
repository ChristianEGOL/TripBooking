<?php
Route::get('/cron/reminder', '\EGOL\ReisenLizenzPayment\Controllers\PaymentReminderController@cronjob');

Route::group(['prefix' => '/payment', 'middleware' => 'auth'], function() {
    Route::get('settings', '\EGOL\ReisenLizenzPayment\Controllers\PaymentSettingsController@index');
    Route::post('search', '\EGOL\ReisenLizenzPayment\Controllers\PaymentController@postSearch');

    Route::patch('{id}/transform', '\EGOL\ReisenLizenzPayment\Controllers\PaymentController@transform');
    Route::patch('{id}/patchComment', '\EGOL\ReisenLizenzPayment\Controllers\PaymentController@patchComment');
    Route::patch('{id}/customer/{customer}/pay', '\EGOL\ReisenLizenzPayment\Controllers\CustomerController@patchCustomerPayed');

    Route::resource('{id}/history', '\EGOL\ReisenLizenzPayment\Controllers\PaymentHistoryController');
    Route::resource('{id}/reminder', '\EGOL\ReisenLizenzPayment\Controllers\PaymentReminderController');
    Route::resource('settings/todo', '\EGOL\ReisenLizenzPayment\Controllers\PaymentDefaultTodoController');
    Route::resource('{id}/todo', '\EGOL\ReisenLizenzPayment\Controllers\PaymentTodoController');
    Route::resource('reminder', '\EGOL\ReisenLizenzPayment\Controllers\PaymentDefaultReminderController');
});

Route::resource('payment', '\EGOL\ReisenLizenzPayment\Controllers\PaymentController');
