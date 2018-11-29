<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pricetable;

class PricetableController extends Controller
{
    public function getIndex(){

      $currentPrices = Pricetable::orderBy('created_at', 'desc')->first();
      $pricetables = [];

      if($currentPrices){
        $pricetables = Pricetable::orderBy('created_at', 'desc')->where('id', '!=', $currentPrices->id)->get();
      }

      return view('admin.pricetable.index', ['currentPrices' => $currentPrices, 'pricetables' => $pricetables]);
    }

    public function postCreate(Request $request){
      $request->validate([
        'normalprice' => 'required',
        'overtimeprice' => 'required'
      ]);
      Pricetable::create([
        'normalprice' => $request->normalprice,
        'overtimeprice' => $request->overtimeprice
      ]);
      return redirect()->route('admin.pricetable.getindex')
          ->with('msg', 'Preço atualizado com sucesso')
          ->with('type', 'success');
    }
}
