@extends('master.admin')

@section('content')
<form>
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" class="form-control" id="name" aria-describedby="" placeholder="Nome">
                        <small id="nome" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="cnpj">CNPJ</label>
                        <input type="cnpj" class="form-control" id="cnpj" placeholder="CNPJ">
                    </div>
                    <div class="form-group text-right">
                        <button class="btn btn-success">Cadastrar</button>
                    </div>
                </form>
  @endsection