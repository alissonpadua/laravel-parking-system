@extends('master.admin')

@section('content')
<div class="container-fluid">
            
            <div class="form-group">
               <label for="disabledTextInput">Posição X</label>
               <input type="text" id="TextInput" class="form-control" placeholder="">
            </div>
            <div class="form-group">
               <label for="disabledTextInput">Posição Y</label>
               <input type="text" id="TextInput" class="form-control" placeholder="">
            </div>
            <div class="form-group">
               <label for="disabledTextInput">Rotação</label>
               <input type="text" id="TextInput" class="form-control" placeholder="">
            </div>
            <div class="row">
               <legend class="col-form-label col-sm-2 pt-0">Vaga Ativa?</legend>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked="">
                        <label class="form-check-label" for="gridRadios1">Sim</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                        <label class="form-check-label" for="gridRadios2">Não</label>
                    </div>
                </div>
            </div>
            <div class="form-group text-right">
                <button class="btn btn-success">Cadastrar</button>
            </div>
      </div>
  @endsection