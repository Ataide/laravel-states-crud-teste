@extends('layouts.app')

@section('content')

<div class="container">
    <div class="well well-lg">Aqui está sendo mostrado os usuários e os grupos a que eles pertencem:</div>
    <div class="row">

        @foreach ($users as $user)

        <div class="col-md-3">
            <div class="panel panel-primary">
              <!-- Default panel contents -->
              <div class="panel-heading">{{ $user->name }}</div>
                  <div class="panel-body">
                      <div class="">
                          <strong>Nome:</strong> {{ $user->name }}
                      </div>
                      <div class="">
                          <strong>Email:</strong> {{ $user->email }}
                      </div>

                      <form class="" action="{{ url('/usersPermissions') }}" method="post">
                          {{ csrf_field() }}
                          <div class="">
                              <strong>Tipo:</strong>
                          <input type="hidden" name="id_usuario" value="{{$user->id}}">

                          <select class="" name="group_id">
                              <option> Selecione </option>
                              @foreach ($groups as $element)
                                  <option  value="{{$element->id}}"  {{ $element->id == $user->group_id ? 'selected' : "" }}>{{$element->display_name}}</option>
                              @endforeach

                          </select>
                          </div>
                          <br>
                          <button type="submit" class="btn btn-primary">Atualizar</button>

                      </form>


                  </div>
            </div>
        </div>

        @endforeach
    </div>
</div>

@endsection
