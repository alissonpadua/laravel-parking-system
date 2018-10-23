<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParkingController extends Controller
{

    public function getCheckIn(){
        return view('admin.parking.checkin');
    }
    
    public function getCheckOut(){
        return view('admin.parking.checkout');
    }
}
