@extends('master.admin')

@section('title', 'Veículos')

@section('breadcrumb')
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{ route('admin.home') }}">Dashboard</a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">Veículos</li>
    </ol>
@endsection

@section('content')
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <div class="row">
    <div class="col-md-12">
      <p>
        <a class="btn btn-primary" href="{{ route('admin.vehicle.create') }}">Novo Veículo</a>
      </p>
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Cliente</th>
            <th>Foto</th>
            <th>Marca</th>
            <th>Cor</th>
            <th>Placa</th>
            <th>Modelo</th>
            <th>Ano</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($vehicles as $vehicle)
            <tr>
              <td>{{ $vehicle->client->name }}</td>
              <td>{{ $vehicle->photo }}</td>
              <td>{{ $vehicle->brand->name }}</td>
              <td>{{ $vehicle->color }}</td>
              <td>{{ $vehicle->plate }}</td>
              <td>{{ $vehicle->model }}</td>
              <td>{{ $vehicle->year }}</td>
              <td>
                <div class="btn-group">
                  <a href="{{ route('admin.vehicle.edit', $vehicle->id) }}" class="btn btn-secondary">Editar</a>
                  <a href="#" id="{{ $vehicle->id }}" class="btn btn-danger btnDeleteVehicle">Deletar</a>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
<script>

$(".btnDeleteVehicle").click(function(e){
    e.preventDefault();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var id = $(this).attr("id");
    var line = $(this).parent().parent().parent();
    swal({
      title: 'Confirmação',
      text: "Tem certeza que deseja Deletar esse Veículo?",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Sim, pode deletar!'
    }).then((result) => {
      if (result.value) {
        $.ajax({
            method: "DELETE",
            url: "/admin/vehicle/"+id,
        }).done(function(model) {
            swal("Mensagem", model.msg, model.success == true ? "success" : "error");
            if(model.success){
                line.fadeOut('slow');
            }
        });
      }
    });
});
</script>
@endsection
