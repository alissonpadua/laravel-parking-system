<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        return view('admin.client.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Client::create([
            'name' => $request->name,
            'email' => $request->email,
            'cpf' => $request->cpf,
        ]);
        return redirect()->route('admin.client.index')
            ->with('msg', 'Cliente Cadastrado com sucesso')
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
        $client = Client::find($id);
        if(!$client){
            return redirect()->route('admin.client.index')
                ->with('msg', 'Cliente não encontrado')
                ->with('type', 'danger');
        }
        return view('admin.client.edit', compact('client'));
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
        $client = Client::find($id);
        if(!$client){
            return redirect()->route('admin.client.index')
                ->with('msg', 'Cliente não encontrado')
                ->with('type', 'danger');
        }
        $client->name = $request->name;
        $client->email = $request->email;
        $client->cpf = $request->cpf;
        $client->save();
        return redirect()->route('admin.client.index')
                ->with('msg', 'Cliente Atualizado com sucesso')
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
        $client = Client::find($id);
        if(!$client){
            $msg['success'] = false;
            $msg['msg'] = 'Cliente não encontrado';
            return $msg;
        }
        if($client->delete()){
            $msg['success'] = true;
            $msg['msg'] = 'Cliente Deletado com sucesso';
        }else{
            $msg['success'] = false;
            $msg['msg'] = 'Falha ao Deletar Cliente, tente novamente';
        }
        return $msg;
    }
}
