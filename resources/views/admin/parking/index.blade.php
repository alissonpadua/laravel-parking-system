@extends('master.admin')

@section('title', 'Estacionamentos')

@section('breadcrumb')
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{ route('admin.home') }}">Dashboard</a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">Estacionamentos</li>
    </ol>
@endsection

@section('content')
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <div class="row">
    <div class="col-md-12">
      <p>
        <a class="btn btn-primary" href="{{ route('admin.parking.create') }}">Novo Estacionamento</a>
      </p>
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Nome</th>
            <th>CNPJ</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($parkings as $parking)
            <tr>
              <td>{{ $parking->name }}</td>
              <td>{{ $parking->cnpj }}</td>
              <td>
                <div class="btn-group">
                  <a href="{{ route('admin.parking.edit', $parking->id) }}" class="btn btn-secondary">Editar</a>
                  <a href="#" id="{{ $parking->id }}" class="btn btn-danger btnDeleteParking">Deletar</a>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
<script>

$(".btnDeleteParking").click(function(e){
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
      text: "Tem certeza que deseja Deletar esse Estacionamento e todas suas vagas?",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Sim, pode deletar!',
      cancelButtonText: 'Não'
    }).then((result) => {
      if (result.value) {
        $.ajax({
            method: "DELETE",
            url: "/admin/parking/"+id
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
