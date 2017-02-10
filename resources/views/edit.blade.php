@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-centered">
            <div class="panel panel-info">
              <div class="panel-heading">Editar</div>
                  <div class="panel-body">
                      <form action="{{ url('estados/'.$estado->id) }}" method="post">
                          {{ csrf_field() }}
                          <input name="_method" type="hidden" value="PUT">
                          <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome" value='{{ $estado->nome }}'>
                          </div>
                          <div class="form-group">
                            <label for="sigla">Sigla</label>
                            <input type="text" name="sigla" class="form-control" id="sigla" placeholder="Sigla" value="{{ $estado->sigla }}">
                          </div>
                          <div class="form-group">
                            <label for="historico">Histórico</label>
                            <textarea rows="6" name="historico" class="form-control" id="historico">{{ $estado->historico }}</textarea>
                          </div>

                          <a href="{{ url('estados') }}" class="btn btn-danger">Cancelar</a>
                          <button type="submit" class="btn btn-success">Atualizar</button>
                        </form>

                  </div>
            </div>

        </div>
    </div>
</div>
@endsection
