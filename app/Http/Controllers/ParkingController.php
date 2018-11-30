<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Parking;
use App\Client;
use App\Vehicle;
use App\Moviment;
use App\Partner;
use Carbon\Carbon;
use App\Payment;

class ParkingController extends Controller
{

    public function getCheckin(){

      $vehicles = Vehicle::all();
      $parkings = Parking::all();
      

      return view('admin.parking.checkin', ['vehicles' => $vehicles, 'parkings' => $parkings]);

    }

    public function getCheckout(){

        $moviments = Moviment::all();
        $partners = Partner::all();
        return view('admin.parking.checkout', ['moviments' => $moviments, 'partners' => $partners]);

    }

    public function postCheckout(Request $request){

        $request->validate([
            'totalToPay' => 'required',
            'discount' => 'required',
            'movimentId' => 'required'
        ]);

        $moviment = Moviment::find($request->movimentId);

        if(!$moviment){
            return ['error' => true, 'msg' => 'Falha ao identificar movimentação, tente novamente'];
        }

        if($moviment->leaved_at){
            return ['error' => true, 'msg' => 'Veículo já saiu do estacionamento'];
        }

        $cpfcliente   = $moviment->vehicle->client->cpf;
        $namecliente  =  $moviment->vehicle->client->name;
        $vehiclemodel = $moviment->vehicle->model;
        $vehicleplate = $moviment->vehicle->plate;

        $moviment->leaved_at = Carbon::now();

        if($request->partner){

            $moviment->partner_id = $request->partner;

        }

        $moviment->save();

        Payment::create([
            'moviment_id' => $moviment->id,
            'price' => $request->totalToPay,
            'cpfcliente' => $cpfcliente,
            'namecliente' => $namecliente,
            'vehiclemodel' => $vehiclemodel,
            'vehicleplate' => $vehicleplate,
            'discount' => $request->discount,
            'inputed_at' => $moviment->inputed_at,
            'leaved_at' => $moviment->leaved_at
        ]);


        return ['error' => false, 'msg' => 'Veículo liberado para saída'];


    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parkings = Parking::all();
        return view('admin.parking.index', compact('parkings'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.parking.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'cnpj' => 'required|min:18',
        ]);
        Parking::create([
            'name' => $request->name,
            'cnpj' => $request->cnpj,
        ]);
        return redirect()->route('admin.parking.index')
            ->with('msg', 'Estacionamento Cadastrado com sucesso')
              ->with('type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $parking = Parking::find($id);
        if(!$parking){
            return redirect()->route('admin.parking.index')
                ->with('msg', 'Estacionamento não encontrado')
                ->with('type', 'danger');
        }
        return view('admin.parking.edit', compact('parking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);     
        $parking = Parking::find($id);
        if(!$parking){
            return redirect()->route('admin.parking.index')
                ->with('msg', 'Estacionamento não encontrado')
                ->with('type', 'danger');
        }
        $parking->name = $request->name;
        $parking->save();
        return redirect()->route('admin.parking.index')
                ->with('msg', 'Estacionamento Atualizado com sucesso')
                ->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $parking = Parking::find($id);
        if(!$parking){
            $msg['success'] = false;
            $msg['msg'] = 'Estacionamento não encontrado';
            return $msg;
        }
        if($parking->delete()){
            $msg['success'] = true;
            $msg['msg'] = 'Estacionamento Deletado com sucesso';
        }else{
            $msg['success'] = false;
            $msg['msg'] = 'Falha ao Deletar Estacionamento, tente novamente';
        }
        return $msg;
      
    }
}
