@extends('layouts.app')

@section('content')


<div class="container">
    <div class="well well-lg">Aqui está sendo mostrado os tipos de usuários e suas permissões:</div>
    <div class="row">
        @foreach ($groups as $group)
            <div class="col-md-4">
                <div class="panel panel-primary">
                  <!-- Default panel contents -->
                  <div class="panel-heading">{{ $group->display_name }}</div>
                  <div class="panel-body">
                      Regras do grupo:
                      <form action="{{ url('/permissions') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="group_id" value="{{ $group->id }}">
                        <div class="checkbox">
                          <label><input type="checkbox" name="ids_permissions[]" value="1" {{ (in_array('1', $group->permissions)) ? 'checked' : "" }}>Criar</label>
                        </div>
                        <div class="checkbox">
                          <label><input type="checkbox" name="ids_permissions[]" value="2" {{ (in_array('2', $group->permissions)) ? 'checked' : "" }}>Ler</label>
                        </div>
                        <div class="checkbox">
                          <label><input type="checkbox" name="ids_permissions[]" value="3" {{ (in_array('3', $group->permissions)) ? 'checked' : "" }}>Editar</label>
                        </div>
                        <div class="checkbox">
                          <label><input type="checkbox" name="ids_permissions[]" value="4" {{ (in_array('4', $group->permissions)) ? 'checked' : "" }}>Deletar</label>
                        </div>
                        <button type="submit" name="button" class="btn btn-primary">Atualizar</button>

                    </form>

                  </div>
                </div>
            </div>
        @endforeach

    </div>
</div>

@endsection
