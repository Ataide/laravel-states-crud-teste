@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-centered">
            <div class="panel panel-info">
              <div class="panel-heading">Visualizar</div>
                  <div class="panel-body">
                      <form>
                          <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" class="form-control" id="nome" disabled placeholder="Nome" value='{{ $estado->nome }}'>
                          </div>
                          <div class="form-group">
                            <label for="sigla">Sigla</label>
                            <input type="text" name="sigla" class="form-control" id="sigla" disabled placeholder="Sigla" value="{{ $estado->sigla }}">
                          </div>
                          <div class="form-group">
                            <label for="historico">Histórico</label>
                            <textarea rows="6" type="text" name="historico" class="form-control" id="historico" placeholder="Histórico" disabled>{{ $estado->historico }}</textarea>
                          </div>
                          <a href="{{ url('estados') }}" class="btn btn-primary">Voltar</a>

                        </form>

                  </div>
            </div>

        </div>
    </div>
</div>
@endsection
