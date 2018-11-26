@extends('master.admin')

@section('title', 'Estacionamento')

@section('breadcrumb')
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{ route('admin.home') }}">Dashboard</a>
      </li>
      <li class="breadcrumb-item" aria-current="page">
        <a href="{{ route('admin.parking.index') }}">Estacionamentos</a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">Editar Estacionamento</li>
    </ol>
@endsection

@section('content')

  <div class="row">
    <div class="col-md-12">
      <form action="{{ route('admin.parking.update', $parking->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="name">Nome</label>
          <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" name="name" type="text" value="{{ $parking->name }}">
          @if ($errors->has('name'))
              <span class="help-block text-danger">
                  <strong>{{ $errors->first('name') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group">
          <label for="cnpj">CNPJ</label>
          <input class="form-control" type="text" value="{{ $parking->cnpj }}" disabled>
        </div>
        <div class="form-group text-right">
          <button type="submit" class="btn btn-success">Salvar Alterações</button>
        </div>
      </form>
    </div>
  </div>

  <script>
    $('#cnpj').mask('99.999.999/0001-11');
  </script>
@endsection
