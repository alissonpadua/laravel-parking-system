<?php

Route::get('/', function () {
    return view('master.admin');
});

<<<<<<< HEAD
Route::get('admin/veiculo/cadastrar', 'VehicleController@getCreate')->name('admin.vehicle.getCreate');
=======

Route::get('admin/parking/checkin', 'ParkingController@getCheckIn')->name('admin.parking.getCheckIn');
Route::get('admin/parking/checkout', 'ParkingController@getCheckOut')->name('admin.parking.getCheckOut');
>>>>>>> e79bab76b5a19178e046544a91f052d8a27bc2d3
