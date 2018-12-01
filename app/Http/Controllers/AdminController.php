<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Parking;
use App\Payment;
use Carbon\Carbon;

class AdminController extends Controller
{
  public function getHome(){
    $parkings = Parking::all();
    $allPayments = Payment::all();
    $todayPayments = Payment::where('created_at', '>=', Carbon::today())->get();
    return view('admin.home', compact('parkings', 'allPayments', 'todayPayments'));
  }
    
}