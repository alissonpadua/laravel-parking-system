<?php

Route::get('/', function () {
    return view('master.admin');
});

Route::get('admin/veiculo/cadastrar', 'VehicleController@getCreate')->name('admin.vehicle.getCreate');
