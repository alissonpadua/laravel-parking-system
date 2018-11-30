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

    <meta name="csrf-token" content="{{ csrf_token() }}" />

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
                @if(!$moviment->leaved_at)
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
                @endif
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

                                @foreach($partners as $partner)

                                    <option value="{{ $partner->id }}" discount="{{ $partner->discount }}">{{ $partner->name }} ({{ $partner->discount }}%)</option>

                                @endforeach
                            </select>
                        </div>
                        <h5>Fechamento</h5>
                        <table id="tblResult" class="table table-hover">

                            <td>Total Horas<br><input type="text" class="form-control" id="hoursTotal" disabled></td>
                            <td>Horas à Pagar<br><input type="text" class="form-control" id="hoursToPay" disabled></td>
                            <td>Desconto Parceiro<br><input type="text" class="form-control" id="partnerDiscount" value="0" disabled></td>
                            <td>Total à Pagar<br><input type="text" class="form-control" id="totalToPay" disabled></td>

                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button id="btnLeaveConfirm" type="button" class="btn btn-info">Concluir Saída</button>
                    </div>
                </div>
            </div>
        </div>

    <script>

        var totalToPay = 0.00;
        var discount = 0.00;
        var movimentId = "";

        $(".btnCloseBill").click(function(e){
            e.preventDefault();
            
            movimentId = $(this).attr('id');

            
            $.ajax({
                url: '/admin/moviment/checkout-resume/'+movimentId,
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

                    totalToPay = data.totalToPay.toFixed(2);
                    var totalToPayHtml = "R$ " + data.totalToPay.toFixed(2).replace(".", ",");
        
                    $("#hoursTotal").val(data.hoursTotal);
                    $("#hoursToPay").val(data.hoursToPay);
                    $("#totalToPay").val(totalToPayHtml);

                    $("#myCloseBill").modal("show");

                }
            });
        });


        $("#partner").change(function(){
            
            calculateDiscount();

        });

        $("#btnLeaveConfirm").click(function(e){
            e.preventDefault();

            if(totalToPay == "" || movimentId == ""){
                swal(
                    'Erro',
                    'Falha ao processar saída, atualize a tela e tente novamente',
                    'error'
                );
            }else{

                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                var partner = $("#partner").val();
     
                $.ajax({
                    url: '/admin/parking/checkout',
                    type: 'POST',
                    data: {'_token': CSRF_TOKEN, 'totalToPay': totalToPay, 'discount': discount, 'movimentId': movimentId, 'partner': partner},
                    dataType: 'JSON',
                    error: function(x, e) {
                        if (x.status == 422) {
                            swal(
                                'Erro',
                                'Falha ao confirmar saída, atualize a página e tente novamente',
                                'error'
                            );
                        }

                        if (x.status == 500) {
                            swal(
                                'Erro',
                                'Falha de Sistema, contate o administrador',
                                'error'
                            );
                        }
                    },
                    success: function (data) { 
                        
                        swal(
                            data.error ? 'Erro' : 'Sucesso',
                            data.msg,
                            data.error ? 'error' : 'success'
                        )

                    }
                }); 

            }

        });

        
        $('#myCloseBill').on('hidden.bs.modal', function (e) {
            
            $("#hoursTotal").val("");
            $("#hoursToPay").val("");
            $("#partnerDiscount").val("");
            $("#totalToPay").val("");
            $('#partner option:first').prop('selected',true);
            location.reload();

        });

        function calculateDiscount(){

            discount = 0.00;

            if($("#partner").val() != ""){

                discount = parseFloat($("#partner option:selected").attr("discount").replace(",", "."));

            }

            var totalDiscount = ((totalToPay * discount)/100);
            var totalToPayHtml = "R$ " + (totalToPay - totalDiscount).toFixed(2).replace(".", ",");

            $("#partnerDiscount").val("R$ " + totalDiscount.toFixed(2).replace(".", ","));
            $("#totalToPay").val(totalToPayHtml);
         
        }

    </script>

@endsection
