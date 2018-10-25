<?php

Route::get('/', function () {
    return view('master.admin');
});
Route::get('admin/parking/checkin', 'ParkingController@getCheckIn')->name('admin.parking.getCheckIn');
Route::get('admin/parking/checkout', 'ParkingController@getCheckOut')->name('admin.parking.getCheckOut');
