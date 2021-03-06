@extends('master.admin')

@section('title', 'Marcas')

@section('breadcrumb')
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{ route('admin.home') }}">Dashboard</a>
      </li>
      <li class="breadcrumb-item" aria-current="page">
        <a href="{{ route('admin.brand.index') }}">Marcas</a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">Nova Marca</li>
    </ol>
@endsection

@section('content')

  <div class="row">
    <div class="col-md-12">
      <form action="{{ route('admin.brand.store') }}" method="POST">
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
        <div class="form-group text-right">
          <button type="submit" class="btn btn-success">Cadastrar</button>
        </div>
      </form>
    </div>
  </div>
@endsection
