@extends('master.admin')

@section('title', 'Vagas')

@section('breadcrumb')
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{ route('admin.home') }}">Dashboard</a>
      </li>
      <li class="breadcrumb-item" aria-current="page">
        <a href="{{ route('admin.space.index') }}">Vagas</a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">Nova Vaga</li>
    </ol>
@endsection

@section('content')

  <div class="row">
    <div class="col-md-12">
      <form action="{{ route('admin.space.store') }}" method="POST">
        @csrf
        @method('POST')
        <div class="form-group">
          <label for="parking_id">Estacionamento</label>
          <select class="form-control {{ $errors->has('parking_id') ? 'is-invalid' : '' }}" id="parking_id" name="parking_id">
            @foreach($parkings as $parking)
              <option value="{{ $parking->id }}">{{ $parking->name }}</option>
            @endforeach
          </select>
          @if ($errors->has('parking_id'))
              <span class="help-block text-danger">
                  <strong>{{ $errors->first('parking_id') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group">
          <label for="externalid">Identificação</label>
          <input class="form-control {{ $errors->has('externalid') ? 'is-invalid' : '' }}" id="externalid" name="externalid" type="text" value="{{ old('externalid') }}">
          @if ($errors->has('externalid'))
              <span class="help-block text-danger">
                  <strong>{{ $errors->first('externalid') }}</strong>
              </span>
          @endif
        </div>

        <div class="custom-control custom-radio {{ $errors->has('active') ? 'is-invalid' : '' }}">
            <input type="radio" id="activetrue" name="active" class="custom-control-input" checked value="1">
            <label class="custom-control-label" for="activetrue">SIM</label>
        </div>
        <div class="custom-control custom-radio {{ $errors->has('active') ? 'is-invalid' : '' }}">
            <input type="radio" id="activefalse" name="active" class="custom-control-input" value="0">
            <label class="custom-control-label" for="activefalse">NÃO</label>
        </div>

        <p>
            @if($errors->has('active'))
              <span class="help-block text-danger">
                  <strong>{{ $errors->first('active') }}</strong>
              </span>
            @endif
        </p>

        <div class="form-group text-right">
          <button type="submit" class="btn btn-success">Cadastrar</button>
        </div>
      </form>
    </div>
  </div>
@endsection
