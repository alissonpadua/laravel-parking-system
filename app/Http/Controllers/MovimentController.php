<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Moviment;
use Carbon\Carbon;
use App\Vehicle;
use App\Space;

class MovimentController extends Controller
{
    
    public function postConfirmEntrance(Request $request){


        $validator = Validator::make($request->all(), ['vehicle_id' => 'required', 'space_id' => 'required']);

        if ($validator->fails()) {

           return response()->json($validator->errors(), 422);

        }

        $vehicle_id = explode('_', $request->vehicle_id)[1];
        $space_id = explode('_', $request->space_id)[1];

        $vehicle = Vehicle::find($vehicle_id);
        $space = Space::find($space_id);

        if(!$vehicle){
            return ['error' => true, 'msg' => 'Não foi possível localizar o veículo'];
        }

        if($vehicle->isParked()){
            return ['error' => true, 'msg' => 'Este veículo já se encontra estacionado'];
        }

        if(!$space){
            return ['error' => true, 'msg' => 'Não foi possível localizar essa vaga'];
        }

        if($space->isBusy()){
            return ['error' => true, 'msg' => 'Esta vaga já se encontra ocupada'];
        }

        
        Moviment::create([
            'vehicle_id' => $vehicle_id,
            'space_id' => $space_id,
            'inputed_at' => Carbon::now()
        ]);


        return ['error' => false, 'msg' => 'Veículo liberado para entrada'];

    }

}
