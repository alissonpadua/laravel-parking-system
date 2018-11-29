@extends('master.admin')

@section('title', 'Registrar Saída de Veículo')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.home') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Registrar Saída de Veículo</li>
    </ol>
@endsection

@section('content')

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Cliente</th>
                <th>Veículo</th>
                <th>Placa</th>
                <th>Vaga</th>
                <th>Entrada</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

            @foreach($moviments as $moviment)
                <tr>
                    <td>{{ $moviment->vehicle->client->name }}</td>
                    <td>{{ $moviment->vehicle->model }} - {{ $moviment->vehicle->year }}</td>
                    <td>{{ $moviment->vehicle->plate }}</td>
                    <td>{{ $moviment->space->externalid }}</td>
                    <td>{{ $moviment->inputed_at }}</td>
                    <td>
                        <button type="button" class="btn btn-warning btnCloseBill">Registrar Saída</button>
                    </td>
                </tr>
            
            @endforeach

        </tbody>
    </table>

@endsection
