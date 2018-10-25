<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function getCreate(){
        return view('admin.brand.create');
    }


}
