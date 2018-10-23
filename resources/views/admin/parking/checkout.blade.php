@extends('master.admin')

@section('title', 'Registrar Saída de Veículo')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Registrar Saída de Veículo</li>
    </ol>
@endsection

@section('content')

    <div class="form-group mb-3">
        <input type="text" class="form-control" placeholder="Buscar por nome, cpf, veiculo ou placa">
    </div>

    <table class="table table-hover">
        <thead>
            <tr>
                <th></th>
                <th>Cliente</th>
                <th>Veículo</th>
                <th>Placa</th>
                <th>Vaga</th>
                <th>Entrada</th>
                <th>Saída</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <span class="badge badge-warning p-2">Estacionado</span>
                </td>
                <td>ALISSON DE PÁDUA</td>
                <td>CHEVROLET - AGILE 2011</td>
                <td>HMT-4070</td>
                <td>SUPA1</td>
                <td>26/09/2018 - 08:30</td>
                <td>
                    <button type="button" class="btn btn-info btnCloseBill">Registrar Saída</button>
                </td>
            </tr>
        </tbody>
    </table>

@endsection
