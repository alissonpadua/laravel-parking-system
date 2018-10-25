@extends('master.admin')

@section('title', 'Registrar Entrada de Veículo')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Registrar Entrada de Veículo</li>
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
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <span class="badge badge-success p-2">Saiu</span>
                </td>
                <td>ALISSON DE PÁDUA</td>
                <td>CHEVROLET - AGILE 2011</td>
                <td>HMT-4070</td>
                <td>
                    <button id="btnEntrance" type="button" class="btn btn-info">Registrar Entrada</button>
                </td>
            </tr>
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
                            <div class="row">
                                <div class="col-lg-2 col-md-3 col-xs-6">
                                    <div class="funkyradio-info">
                                        <input type="radio" name="radio" id="radio1" />
                                        <label for="radio1">01 - SUPA1</label>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-3 col-xs-6">
                                    <div class="funkyradio-info">
                                        <input type="radio" name="radio" id="radio2" />
                                        <label for="radio2">02 - SUPA2</label>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-3 col-xs-6">
                                    <div class="funkyradio-info">
                                        <input type="radio" name="radio" id="radio3" />
                                        <label for="radio3">03 - SUPA3</label>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-3 col-xs-6">
                                    <div class="funkyradio-info">
                                        <input type="radio" name="radio" id="radio4" />
                                        <label for="radio4">04 - SUPA4</label>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-3 col-xs-6">
                                    <div class="funkyradio-info">
                                        <input type="radio" name="radio" id="radio5" />
                                        <label for="radio5">05 - SUPA5</label>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-3 col-xs-6">
                                    <div class="funkyradio-info">
                                        <input type="radio" name="radio" id="radio6" />
                                        <label for="radio6">06 - SUPA6</label>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-3 col-xs-6">
                                    <div class="funkyradio-info">
                                        <input type="radio" name="radio" id="radio7" />
                                        <label for="radio7">07 - SUPA7</label>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-3 col-xs-6">
                                    <div class="funkyradio-info">
                                        <input type="radio" name="radio" id="radio8" />
                                        <label for="radio8">08 - SUPA8</label>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-3 col-xs-6">
                                    <div class="funkyradio-info">
                                        <input type="radio" name="radio" id="radio9" />
                                        <label for="radio9">09 - SUPA9</label>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-3 col-xs-6">
                                    <div class="funkyradio-info">
                                        <input type="radio" name="radio" id="radio10" />
                                        <label for="radio10">010 - SUPA10</label>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-3 col-xs-6">
                                    <div class="funkyradio-info">
                                        <input type="radio" name="radio" id="radio11" />
                                        <label for="radio11">011 - SUPA11</label>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-3 col-xs-6">
                                    <div class="funkyradio-info">
                                        <input type="radio" name="radio" id="radio12" />
                                        <label for="radio12">012 - SUPA12</label>
                                    </div>
                                </div>                                
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="btnConfirmEntrance" type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-info" data-dismiss="modal">Continuar</button>
                    </div>
                </div>
            </div>
        </div>
@endsection
