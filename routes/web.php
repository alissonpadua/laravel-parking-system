<?php

Route::get('/', function () {
    return view('master.admin');
});

Route::prefix('admin')->group(function(){
    Route::get('parking/checkin', 'ParkingController@getCheckIn')->name('admin.parking.getCheckIn');
    Route::get('parking/checkout', 'ParkingController@getCheckOut')->name('admin.parking.getCheckOut');

    Route::resource('client', 'ClientController')->names([
        'index' => 'admin.client.index',
        'create' => 'admin.client.create',
        'store' => 'admin.client.store',
        'edit' => 'admin.client.edit',
        'update' => 'admin.client.update'
    ]);
});