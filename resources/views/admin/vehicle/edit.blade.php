@extends('master.admin')

@section('title', 'Veículos')

@section('breadcrumb')
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{ route('admin.home') }}">Dashboard</a>
      </li>
      <li class="breadcrumb-item">
        <a href="{{ route('admin.vehicle.index') }}">Veículos</a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">Editar Veículo</li>
    </ol>
@endsection


@section('content')

  <div class="row">
    <div class="col-md-12">
      <form action="{{ route('admin.vehicle.update', $vehicle->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="client">Cliente</label>
          <input class="form-control" value="{{ $vehicle->client->name }}" type="text" disabled>
          @if ($errors->has('client_id'))
              <span class="help-block text-danger">
                  <strong>{{ $errors->first('client_id') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group">
          <label for="brand">Marca</label>
          <input class="form-control" value="{{ $vehicle->brand->name }}" type="text" disabled>
          @if ($errors->has('brand_id'))
              <span class="help-block text-danger">
                  <strong>{{ $errors->first('brand_id') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group">
          <label for="color">Cor do Veículo</label>
          <input class="form-control {{ $errors->has('color') ? 'is-invalid' : '' }}" id="color" name="color" type="text" value="{{  $vehicle->color }}">
          @if ($errors->has('color'))
              <span class="help-block text-danger">
                  <strong>{{ $errors->first('color') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group">
          <label for="plate">Placa</label>
          <input class="form-control" type="text" value="{{ $vehicle->plate }}" disabled>
          @if ($errors->has('plate'))
              <span class="help-block text-danger">
                  <strong>{{ $errors->first('plate') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group">
          <label for="model">Modelo</label>
          <input class="form-control {{ $errors->has('model') ? 'is-invalid' : '' }}" id="model" name="model" type="text" value="{{  $vehicle->model }}">
          @if ($errors->has('model'))
              <span class="help-block text-danger">
                  <strong>{{ $errors->first('model') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group">
          <label for="year">Ano de Fabricação</label>
          <input class="form-control {{ $errors->has('year') ? 'is-invalid' : '' }}" id="year" name="year" type="text" value="{{  $vehicle->year }}">
          @if ($errors->has('year'))
              <span class="help-block text-danger">
                  <strong>{{ $errors->first('year') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group text-right">
          <button type="submit" class="btn btn-success">Salvar Alterações</button>
        </div>
      </form>
    </div>
  </div>
  <script>
    $("#plate").mask('AAA-9999');
    $("#year").mask('9999');
  </script>
@endsection
