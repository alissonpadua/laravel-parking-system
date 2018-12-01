@extends('master.admin')

@section('title', 'Dashboard')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
@endsection

@section('content')

<div class="row">
  <div class="col-md-4">
    <div class="card">
      <div class="card-body text-center">
        <h4>{{ count($allPayments) }}</h4>
        <b>MOVIMENTO TOTAL</b>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="card">
      <div class="card-body text-center">
        <h4>{{ count($todayPayments) }}</h4>
        <b>MOVIMENTO HOJE</b>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="card">
      <div class="card-body text-center">
        <h4>R$ {{ number_format($todayPayments->sum('price'), 2, ',', '.') }}</h4>
        <b>RECEBER HOJE</b>
      </div>
    </div>
  </div>
</div>

  @foreach($parkings as $parking)
    <div class="row">
      <div class="pt-3 pb-2 mb-3 border-bottom">
          <h4>{{ $parking->name }}</h4>
      </div>
    </div>
    <div class="row">
      @foreach($parking->spaces as $space)
        <div class="col-md-3">
          <div data-toggle="tooltip" data-placement="top"
            title="{{ $space->isBusy() ? $space->moviment->vehicle->plate : 'LIVRE' }}"
            class="space {{ $space->isBusy() ? 'border-danger text-danger' : 'border-success text-success' }}
            p-2 border text-center rounded bg-light">{{ $space->externalid }}</div>
        </div>
      @endforeach
    </div>
  @endforeach
  <script>
    $('[data-toggle="tooltip"]').tooltip()
  </script>
@endsection
