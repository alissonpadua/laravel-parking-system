<?php

Route::get('/', function () {
    return view('admin.home');
})->name('admin.home');

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
  Route::resource('brand', 'BrandController')->names([
    'index' => 'admin.brand.index',
    'create' => 'admin.brand.create',
    'store' => 'admin.brand.store',
    'edit' => 'admin.brand.edit',
    'update' => 'admin.brand.update'
  ]);
  Route::resource('vehicle', 'BrandController')->names([
    'index' => 'admin.vehicle.index',
    'create' => 'admin.vehicle.create',
    'store' => 'admin.vehicle.store',
    'edit' => 'admin.vehicle.edit',
    'update' => 'admin.vehicle.update'
  ]);
});