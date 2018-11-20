@extends('master.admin')

@section('title', 'Parceiros')

@section('breadcrumb')
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{ route('admin.home') }}">Dashboard</a>
      </li>
      <li class="breadcrumb-item" aria-current="page">
        <a href="{{ route('admin.partner.index') }}">Parceiros</a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">Novo Parceiro</li>
    </ol>
@endsection

@section('content')

  <div class="row">
    <div class="col-md-12">
      <form action="{{ route('admin.partner.store') }}" method="POST">
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
          <label for="name">% Desconto</label>
          <input class="form-control {{ $errors->has('discount') ? 'is-invalid' : '' }}" id="discount" name="discount" type="text" value="{{ old('discount') }}">
          @if ($errors->has('discount'))
              <span class="help-block text-danger">
                  <strong>{{ $errors->first('discount') }}</strong>
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
    $('#discount').mask('##0,00', {reverse: true});
  </script>
@endsection
