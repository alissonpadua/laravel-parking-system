<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
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
      ]);
      Brand::create([
          'name' => $request->name,
      ]);
      return redirect()->route('admin.brand.index')
          ->with('msg', 'Marca Cadastrada com sucesso')
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
      $brand = Brand::find($id);
      if(!$brand){
          return redirect()->route('admin.brand.index')
              ->with('msg', 'Marca não encontrada')
              ->with('type', 'danger');
      }
      return view('admin.brand.edit', compact('brand'));
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
      ]);     
      $brand = Brand::find($id);
      if(!$brand){
          return redirect()->route('admin.brand.index')
              ->with('msg', 'Marca não encontrada')
              ->with('type', 'danger');
      }
      $brand->name = $request->name;
      $brand->save();
      return redirect()->route('admin.brand.index')
              ->with('msg', 'Marca Atualizada com sucesso')
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
      $brand = Brand::find($id);
      if(!$brand){
          $msg['success'] = false;
          $msg['msg'] = 'Marca não encontrada';
          return $msg;
      }
      if($brand->delete()){
          $msg['success'] = true;
          $msg['msg'] = 'Marca Deletada com sucesso';
      }else{
          $msg['success'] = false;
          $msg['msg'] = 'Falha ao Deletar Marca, tente novamente';
      }
      return $msg;
    }
}
