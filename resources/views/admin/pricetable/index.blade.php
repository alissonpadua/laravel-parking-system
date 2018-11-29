@extends('master.admin')

@section('title', 'Tabela de Preços')

@section('breadcrumb')
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{ route('admin.home') }}">Dashboard</a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">Tabela de Preços</li>
    </ol>
@endsection

@section('content')

  <div class="row">
    <div class="col-md-12">
      <form action="{{ route('admin.pricetable.postCreate') }}" method="POST">
        @csrf
        @method('POST')
        <div class="form-group">
          <label for="normalprice">Hora Normal (R$)</label>
          <input class="form-control price {{ $errors->has('normalprice') ? 'is-invalid' : '' }}" id="normalprice" name="normalprice" type="text" value="{{ $currentPrices ? $currentPrices->normalprice : '' }}">
          @if ($errors->has('normalprice'))
              <span class="help-block text-danger">
                  <strong>{{ $errors->first('normalprice') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group">
          <label for="overtimeprice">Hora Excdedente (R$)</label>
          <input class="form-control price {{ $errors->has('overtimeprice') ? 'is-invalid' : '' }}" id="overtimeprice" name="overtimeprice" type="text" value="{{ $currentPrices ? $currentPrices->overtimeprice : '' }}">
          @if ($errors->has('overtimeprice'))
              <span class="help-block text-danger">
                  <strong>{{ $errors->first('overtimeprice') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group text-right">
          <button type="submit" class="btn btn-success">Cadastrar</button>
        </div>
      </form>
    </div>
  </div>

    <div class="row">
      <div class="col-md-12">
        <h4>Histórico de Preços</h4>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Hora Normal (R$)</th>
                <th>Hora Excdedente (R$)</th>
                <th>Alterado em</th>
              </tr>
            </thead>
            <tbody>
              @foreach($pricetables as $pricetable)
                <tr>
                  <td>{{ $pricetable->id }}</td>
                  <td>R$ {{ $pricetable->normalprice }}</td>
                  <td>R$ {{ $pricetable->overtimeprice }}</td>
                  <td>{{ $pricetable->updated_at }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

  <script>
    $('.price').mask('##0,00', {reverse: true});
  </script>
@endsection
