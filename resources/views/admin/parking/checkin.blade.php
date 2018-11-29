@extends('master.admin')

@section('title', 'Registrar Entrada de Veículo')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.home') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Registrar Entrada de Veículo</li>
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
                <th></th>
            </tr>
        </thead>
        <tbody>
          @foreach($vehicles as $vehicle)
            @if(!$vehicle->isParked())
              <tr>
                  <td>{{ $vehicle->client->name }}</td>
                  <td>{{ $vehicle->model }} - {{ $vehicle->color }}</td>
                  <td>{{ $vehicle->plate }}</td>
                  <td>
                      <button id="vehicle_{{ $vehicle->id }}" type="button" class="btn btn-info btnEntrance">Registrar Entrada</button>
                  </td>
              </tr>
            @endif
          @endforeach
        </tbody>
    </table>

    <div id="myOpenSpace" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-full" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Vagas Disponíveis</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="funkyradio">
            

                            @foreach($parkings as $parking)

                                @if(count($parking->spaces) > 0)

                                    <h5>{{ $parking->name }}</h5>

                                    <div class="row">

                                        @foreach($parking->spaces as $space)

                                            @if(!$space->isBusy())

                                                <div class="col-lg-2 col-md-3 col-xs-6">
                                                    <div class="funkyradio-info">
                                                        <input type="radio" name="space" id="space_{{ $space->id }}">
                                                        <label for="space_{{ $space->id }}">{{ $space->externalid }}</label>
                                                    </div>
                                                </div>
                                                
                                            @endif

                                        @endforeach
        
                                    
                                    </div>

                                @endif

                            @endforeach
                     
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button id="btnConfirmEntrance" type="button" class="btn btn-info">Continuar</button>
                </div>
            </div>
        </div>
    </div>

    <script>

        //['vehicle_id', 'space_id', 'partner_id', 'inputed_at', 'leaved_at'];

        var vehicle_id = '';
        var space_id = '';

        $(".btnEntrance").click(function(e){

            e.preventDefault();

            vehicle_id =$(this).attr('id');
            $("#myOpenSpace").modal('show');

        });

        
        $("#btnConfirmEntrance").click(function(e){

            e.preventDefault();
            space_id = $('input[name=space]:checked', '.funkyradio').attr('id');

            if(!space_id){
                swal(
                    'Erro',
                    'Você deve selecionar uma vaga',
                    'error'
                )
            }else{

                confirmEntrance(vehicle_id, space_id);

            }

        });

        $('#myOpenSpace').on('hidden.bs.modal', function (e) {
            
            vehicle_id = '';
            space_id = '';
            location.reload();

        });

        function confirmEntrance(vehicle_id, space_id){
            

            if(vehicle_id == "" || space_id == ""){
                swal(
                    'Erro',
                    'Falha ao confirmar entrada, tente novamente',
                    'error'
                );

                $("#myOpenSpace").modal('hide');
            }
            
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
     
            $.ajax({
                url: '/admin/moviment/confirm-entrance',
                type: 'POST',
                data: {'_token': CSRF_TOKEN, 'vehicle_id': vehicle_id, 'space_id': space_id},
                dataType: 'JSON',
                error: function(x, e) {
                    if (x.status == 422) {
                        swal(
                            'Erro',
                            'Falha ao confirmar entrada, tente novamente',
                            'error'
                        );
                        $("#myOpenSpace").modal('hide');
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

    </script>
@endsection
