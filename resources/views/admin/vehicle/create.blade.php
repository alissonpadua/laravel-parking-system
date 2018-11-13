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
      <li class="breadcrumb-item active" aria-current="page">Cadastrar Veículo</li>
    </ol>
@endsection


@section('content')

  <div class="row">
    <div class="col-md-12">
      <form action="{{ route('admin.brand.store') }}" method="POST">
        @csrf
        @method('POST')
        <div class="form-group">
          <label for="client">Cliente</label>
          <select class="form-control {{ $errors->has('client') ? 'is-invalid' : '' }}" id="client" name="client">
            @foreach($clients as $client)
              <option value="{{ $client->id }}">{{ $client->name }}</option>
            @endforeach
          </select>
          @if ($errors->has('client'))
              <span class="help-block text-danger">
                  <strong>{{ $errors->first('client') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group">
          <label for="brand">Marca</label>
          <select class="form-control {{ $errors->has('brand') ? 'is-invalid' : '' }}" id="brand" name="brand">
            @foreach($brands as $brand)
              <option value="{{ $brand->id }}">{{ $brand->name }}</option>
            @endforeach
          </select>
          @if ($errors->has('brand'))
              <span class="help-block text-danger">
                  <strong>{{ $errors->first('brand') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group">
          <label for="color">Cor do Veículo</label>
          <input class="form-control {{ $errors->has('color') ? 'is-invalid' : '' }}" id="color" name="color" type="text" value="{{ old('color') }}">
          @if ($errors->has('color'))
              <span class="help-block text-danger">
                  <strong>{{ $errors->first('color') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group">
          <label for="plate">Placa</label>
          <input class="form-control {{ $errors->has('plate') ? 'is-invalid' : '' }}" id="plate" name="plate" type="text" value="{{ old('plate') }}">
          @if ($errors->has('plate'))
              <span class="help-block text-danger">
                  <strong>{{ $errors->first('plate') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group">
          <label for="model">Modelo</label>
          <input class="form-control {{ $errors->has('model') ? 'is-invalid' : '' }}" id="model" name="model" type="text" value="{{ old('model') }}">
          @if ($errors->has('model'))
              <span class="help-block text-danger">
                  <strong>{{ $errors->first('model') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group">
          <label for="year">Ano de Fabricação</label>
          <input class="form-control {{ $errors->has('year') ? 'is-invalid' : '' }}" id="year" name="year" type="text" value="{{ old('year') }}">
          @if ($errors->has('year'))
              <span class="help-block text-danger">
                  <strong>{{ $errors->first('year') }}</strong>
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
    $("#plate").mask('AAA-9999');
    $("#year").mask('9999');
  </script>
@endsection
