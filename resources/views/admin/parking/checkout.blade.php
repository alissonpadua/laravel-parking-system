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
                        <button id="{{ $moviment->id }}" type="button" class="btn btn-warning btnCloseBill">Registrar Saída</button>
                    </td>
                </tr>
            
            @endforeach

        </tbody>
    </table>


        <div id="myCloseBill" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Relatório de Saída</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="partner">Incluir desconto de Parceiro?</label>
                            <select class="form-control" id="partner" name="partner">
                                <option value="">Nenhum</option>
                                <option value="">Restaurante Galinha Caipirinha</option>
                            </select>
                        </div>
                        <h5>Fechamento</h5>
                        <table id="tblResult" class="table table-hover">

                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-info">Concluir Saída</button>
                    </div>
                </div>
            </div>
        </div>

    <script>

        $(".btnCloseBill").click(function(e){
            e.preventDefault();
            
            var id = $(this).attr('id');

            
            $.ajax({
                url: '/admin/moviment/checkout-resume/'+id,
                type: 'GET',
                dataType: 'JSON',
                error: function(x, e) {
                    if (x.status == 500) {
                        swal(
                            'Erro',
                            'Falha de Sistema, contate o administrador',
                            'error'
                        );
                    }
                },
                success: function (data) {

        
                    
                    var table = '<tr><td>Total Horas<br><input type="text" class="form-control" id="" value="'+ data.hoursTotal +'"></td>';
                    table += '<td><input type="text" class="form-control" id="" value=""></td></tr>';


                    $("#tblResult").html(table);

                    $("#myCloseBill").modal("show");


                }
            });
        });


    </script>

@endsection
