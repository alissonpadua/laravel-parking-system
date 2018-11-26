@extends('master.admin')

@section('title', 'Vagas')

@section('breadcrumb')
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{ route('admin.home') }}">Dashboard</a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">Vagas</li>
    </ol>
@endsection

@section('content')
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <div class="row">
    <div class="col-md-12">
      <p>
        <a class="btn btn-primary" href="{{ route('admin.space.create') }}">Nova Vaga</a>
      </p>


        @foreach($parkings as $parking)

            <div class="card mb-5">
                <div class="card-body">
                    
                    <h3>{{ $parking->name }}</h3>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                            <th>Nome</th>
                            <th>Ativa?</th>
                            <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($parking->spaces as $space)
                            <tr>
                                <td>{{ $space->externalid }}</td>
                                <td>{{ $space->active ? 'SIM' : 'NÃO' }}</td>
                                <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.space.edit', $space->id) }}" class="btn btn-secondary">Editar</a>
                                    <a href="#" id="{{ $space->id }}" class="btn btn-danger btnDeleteSpace">Deletar</a>
                                </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

        @endforeach

    </div>
  </div>
<script>

$(".btnDeleteSpace").click(function(e){
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
      text: "Tem certeza que deseja Deletar essa Vaga?",
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
            url: "/admin/space/"+id
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
