@extends('master.admin')

@section('title', 'Clientes')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item" aria-current="page">
          <a href="{{ route('admin.client.index') }}">Clientes</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Novo Cliente</li>
    </ol>
@endsection

@section('content')

  <div class="row">
    <div class="col-md-12">
      <form action="{{ route('admin.client.store') }}" method="POST">
        @csrf
        @method('POST')
        <div class="form-group">
          <label for="name">Nome</label>
          <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" name="name" type="text" value="{{ old('name') }}">
          @if ($errors->has('name'))
              <span class="help-block text-danger">
                  <strong>{{ $errors->first('name') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group">
          <label for="email">E-Mail</label>
          <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="email" name="email" type="text" value="{{ old('email') }}">
          @if ($errors->has('email'))
              <span class="help-block text-danger">
                  <strong>{{ $errors->first('email') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group">
          <label for="cpf">CPF</label>
          <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="cpf" name="cpf" type="text" value="{{ old('cpf') }}">
          @if ($errors->has('cpf'))
              <span class="help-block text-danger">
                  <strong>{{ $errors->first('cpf') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group text-right">
          <button type="submit" class="btn btn-success">Cadastrar</button>
        </div>
      </form>
    </div>
  </div>
  <script>
    $('#cpf').mask('000.000.000-00');
  </script>
@endsection
