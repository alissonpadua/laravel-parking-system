<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Partner;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = Partner::all();
        return view('admin.partner.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.partner.create');
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
        'discount' => 'required',
      ]);
      Partner::create([
          'name' => $request->name,
          'discount' => $request->discount
      ]);
      return redirect()->route('admin.partner.index')
          ->with('msg', 'Parceiro Cadastrado com sucesso')
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
      $partner = Partner::find($id);
      if(!$partner){
        return redirect()->route('admin.partner.index')
          ->with('msg', 'Parceiro não encontrado')
          ->with('type', 'danger');
      }
      return view('admin.partner.edit', compact('partner'));
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
        'name' => 'required',
        'discount' => 'required'
      ]);     
      $partner = Partner::find($id);
      if(!$partner){
        return redirect()->route('admin.partner.index')
          ->with('msg', 'Parceiro não encontrado')
          ->with('type', 'danger');
      }
      $partner->name = $request->name;
      $partner->discount = $request->discount;
      $partner->save();
      return redirect()->route('admin.partner.index')
              ->with('msg', 'Parceiro Atualizado com sucesso')
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
      $partner = Partner::find($id);
      if(!$partner){
          $msg['success'] = false;
          $msg['msg'] = 'Parceiro não encontrado';
          return $msg;
      }
      if($partner->delete()){
          $msg['success'] = true;
          $msg['msg'] = 'Parceiro Deletado com sucesso';
      }else{
          $msg['success'] = false;
          $msg['msg'] = 'Falha ao Deletar Parceiro, tente novamente';
      }
      return $msg;
    }
}
