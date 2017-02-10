@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-8 col-centered">
            <div class="panel panel-info">
              <div class="panel-heading">Cadastrar Estado</div>
                  <div class="panel-body">
                      <form action="{{ url('/estados') }}" method="POST">
                          {{ csrf_field() }}
                          <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome" required>
                          </div>
                          <div class="form-group">
                            <label for="sigla">Sigla</label>
                            <input type="text" name="sigla" class="form-control" id="sigla" placeholder="Sigla" required>
                          </div>
                          <div class="form-group">
                            <label for="historico">Histórico</label>
                            <textarea type="text" name="historico" class="form-control" id="historico" placeholder="Histórico"></textarea>
                          </div>
                          <a href="{{ url('/estados') }}" class="btn btn-danger">Voltar</a>
                          <button type="submit" class="btn btn-success">Enviar</button>
                        </form>

                  </div>
            </div>

        </div>
    </div>
</div>
@endsection
