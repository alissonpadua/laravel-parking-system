<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Parking;
use App\Space;

class SpaceController extends Controller
{
    
    public function getFreeSpaces(){

        $spaces = Space::all();
        $freeSpaces = collect();

        foreach($spaces as $space){

            if(!$space->isBusy()){
                
                $space->parking_name = $space->parking->name;

                $freeSpaces->push($space);

            }

        }

        return $freeSpaces->groupBy('parking_id');


    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parkings = Parking::all();
        return view('admin.space.index', compact('parkings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parkings = Parking::all();
        return view('admin.space.create', compact('parkings'));
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
            'parking_id' => 'required',
            'externalid' => 'required',
            'active' => 'required'
        ]);
        Space::create([
            'parking_id' => $request->parking_id,
            'externalid' => $request->externalid,
            'active' => $request->active
        ]);
        return redirect()->route('admin.space.index')
            ->with('msg', 'Vaga Cadastrada com sucesso')
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
        $space = Space::find($id);
        if(!$space){
            return redirect()->route('admin.space.index')
                ->with('msg', 'Vaga não encontrada')
                ->with('type', 'danger');
        }
        return view('admin.space.edit', compact('space'));
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

        $space = Space::find($id);
        if(!$space){
            return redirect()->route('admin.space.index')
                ->with('msg', 'Vaga não encontrada')
                ->with('type', 'danger');
        }

        $request->validate([
            'externalid' => 'required',
            'active' => 'required'
        ]);

        $space->externalid = $request->externalid;
        $space->active = $request->active;
        $space->save();

        return redirect()->route('admin.space.index')
            ->with('msg', 'Vaga Atualizada com sucesso')
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
        $space = Space::find($id);
        if(!$space){
            $msg['success'] = false;
            $msg['msg'] = 'Vaga não encontrada';
            return $msg;
        }
        if($space->delete()){
            $msg['success'] = true;
            $msg['msg'] = 'Vaga Deletada com sucesso';
        }else{
            $msg['success'] = false;
            $msg['msg'] = 'Falha ao Deletar Vaga, tente novamente';
        }
        return $msg;
    }
}
