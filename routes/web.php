<?php

Route::middleware(['auth'])->group(function () {

  Route::get('/', 'AdminController@getHome')->name('admin.home');

  Route::prefix('admin')->group(function(){

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

    Route::resource('vehicle', 'VehicleController')->names([
      'index' => 'admin.vehicle.index',
      'create' => 'admin.vehicle.create',
      'store' => 'admin.vehicle.store',
      'edit' => 'admin.vehicle.edit',
      'update' => 'admin.vehicle.update'
    ]);

    Route::resource('partner', 'PartnerController')->names([
      'index' => 'admin.partner.index',
      'create' => 'admin.partner.create',
      'store' => 'admin.partner.store',
      'edit' => 'admin.partner.edit',
      'update' => 'admin.partner.update'
    ]);

    Route::prefix('parking')->group(function () {
      Route::get('checkin', 'ParkingController@getCheckin')->name('admin.parking.getCheckin');
      Route::get('checkout', 'ParkingController@getCheckout')->name('admin.parking.getCheckout');
      Route::post('checkout', 'ParkingController@postCheckout')->name('admin.parking.postCheckout');
    });

    Route::resource('parking', 'ParkingController')->names([
      'index' => 'admin.parking.index',
      'create' => 'admin.parking.create',
      'store' => 'admin.parking.store',
      'edit' => 'admin.parking.edit',
      'update' => 'admin.parking.update'
    ]);

    Route::resource('space', 'SpaceController')->names([
      'index' => 'admin.space.index',
      'create' => 'admin.space.create',
      'store' => 'admin.space.store',
      'edit' => 'admin.space.edit',
      'update' => 'admin.space.update'
    ]);

    Route::prefix('json')->group(function () {
      Route::get('space/free', 'SpaceController@getFreeSpaces')->name('admin.space.getFreeSpaces');
    });

    Route::prefix('pricetable')->group(function () {
      Route::get('', 'PricetableController@getIndex')->name('admin.pricetable.getindex');
      Route::post('', 'PricetableController@postCreate')->name('admin.pricetable.postCreate');
    });

    Route::prefix('moviment')->group(function () {
      Route::post('confirm-entrance', 'MovimentController@postConfirmEntrance');
      Route::get('checkout-resume/{id}', 'MovimentController@getCheckoutResume');
    });

  });
});

Auth::routes();
