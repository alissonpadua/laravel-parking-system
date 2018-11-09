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
      <li class="breadcrumb-item active" aria-current="page">Editar Marca</li>
    </ol>
@endsection

@section('content')

  <div class="row">
    <div class="col-md-12">
      <form action="{{ route('admin.brand.update', $brand->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
          <label for="name">Nome</label>
          <input class="form-control" id="name" name="name" type="text" value="{{ $brand->name }}">
          @if ($errors->has('name'))
              <span class="help-block text-danger">
                  <strong>{{ $errors->first('name') }}</strong>
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
