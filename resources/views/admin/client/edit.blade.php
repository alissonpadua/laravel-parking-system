@extends('master.admin')

@section('title', 'Clientes')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item" aria-current="page">
          <a href="{{ route('admin.client.index') }}">Clientes</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Editar Cliente</li>
    </ol>
@endsection

@section('content')

  <div class="row">
    <div class="col-md-12">
      <form action="{{ route('admin.client.update', $client->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
          <label for="name">Nome</label>
          <input class="form-control" id="name" name="name" type="text" value="{{ $client->name }}">
          @if ($errors->has('name'))
              <span class="help-block text-danger">
                  <strong>{{ $errors->first('name') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
          <label for="email">E-Mail</label>
          <input class="form-control" id="email" name="email" type="text" value="{{ $client->email }}">
          @if ($errors->has('email'))
              <span class="help-block text-danger">
                  <strong>{{ $errors->first('email') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group{{ $errors->has('cpf') ? ' has-error' : '' }}">
          <label for="cpf">CPF</label>
          <input class="form-control" id="cpf" name="cpf" type="text" value="{{ $client->cpf }}">
          @if ($errors->has('cpf'))
              <span class="help-block text-danger">
                  <strong>{{ $errors->first('cpf') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group text-right">
          <button type="submit" class="btn btn-success">Salvar Alterações</button>
        </div>
      </form>
    </div>
  </div>
@endsection
