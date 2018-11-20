<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehicle;
use App\Client;
use App\Brand;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('admin.vehicle.index', compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        $brands = Brand::all();
        return view('admin.vehicle.create', ['clients' => $clients, 'brands' => $brands]);
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
        'client_id' => 'required',
        'brand_id' => 'required',
        'color' => 'required',
        'plate' => 'required|min:8|max:8',
        'model' => 'required',
        'year' => 'required|min:4|max:4'
      ]);

      Vehicle::create($request->all());

      return redirect()->route('admin.vehicle.index')
        ->with('msg', 'Veículo Cadastrado com sucesso')
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
      $vehicle = Vehicle::find($id);
      if(!$vehicle){
          return redirect()->route('admin.vehicle.index')
              ->with('msg', 'Veículo não encontrado')
              ->with('type', 'danger');
      }
      return view('admin.vehicle.edit', compact('vehicle'));
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
        'color' => 'required',
        'model' => 'required',
        'year' => 'required|min:4|max:4'
      ]);  

      $vehicle = Vehicle::find($id);

      if(!$vehicle){
          return redirect()->route('admin.vehicle.index')
              ->with('msg', 'Veículo não encontrado')
              ->with('type', 'danger');
      }

      $vehicle->color = $request->color;
      $vehicle->model = $request->model;
      $vehicle->year = $request->year;
      $vehicle->save();

      return redirect()->route('admin.vehicle.index')
              ->with('msg', 'Veículo Atualizado com sucesso')
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
      $vehicle = Vehicle::find($id);
      if(!$vehicle){
          $msg['success'] = false;
          $msg['msg'] = 'Veículo não encontrado';
          return $msg;
      }
      if($vehicle->delete()){
          $msg['success'] = true;
          $msg['msg'] = 'Veículo Deletado com sucesso';
      }else{
          $msg['success'] = false;
          $msg['msg'] = 'Falha ao Deletar Veículo, tente novamente';
      }
      return $msg;
    }
}
