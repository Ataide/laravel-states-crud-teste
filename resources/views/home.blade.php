@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-2">
            <ul class="list-group permissions">
                Permissões do usuário:
                    @if (Auth::user()->can('create'))
                        <li class="list-group-item list-group-item-success">Criar</li>
                    @endif

                    @if (Auth::user()->can('read'))
                        <li class="list-group-item list-group-item-info">Ler</li>
                    @endif

                    @if (Auth::user()->can('update'))
                        <li class="list-group-item list-group-item-warning">Editar</li>
                    @endif

                    @if (Auth::user()->can('delete'))
                        <li class="list-group-item list-group-item-danger">Deletar</li>
                    @endif

            </ul>
        </div>


        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                        <div class="title pull-left" style="margin-top: 7px;">Lista de Estados

                        </div>

                    <div class="ajax-toggle pull-right">
                        @if (Auth::user()->can('create'))
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalCreate">+ Novo</button>
                        @endif
                    </div>
                </div>
                <table id="list" class="table table-hovered">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Estado</th>
                        <th>Sigla</th>
                        <th style="width: 570px;">Histórico</th>
                        <th>Ação</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($estados as $estado)
                      <tr id="row_{{$estado->id}}">
                        <td>{{ $estado->id}}</td>
                        <td>{{ $estado->nome }}</td>
                        <td>{{ $estado->sigla }}</td>
                        <td>{{ $estado->historico }}</td>
                        <td>
                            @if (Auth::user()->can('read'))
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalShow">Ver</button>
                            @endif
                            @if (Auth::user()->can('update'))
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalEdit">Editar</button>
                            @endif
                            @if (Auth::user()->can('delete'))
                                <a type="button" class="btn btn-danger remove" data-id="{{ $estado->id }}">Excluir</a>
                            @endif
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
                {{ $estados->links() }}
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <form id="create">
          <div class="modal-body">
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


          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
      </form>
    </div>
  </div>
</div>


<div class="modal fade" id="modalShow" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <form id="show">
          <div class="modal-body">
                  <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" class="form-control" placeholder="Nome" disabled>
                  </div>
                  <div class="form-group">
                    <label for="sigla">Sigla</label>
                    <input type="text" name="sigla" class="form-control"  placeholder="Sigla" disabled>
                  </div>
                  <div class="form-group">
                    <label for="historico">Histórico</label>
                    <textarea rows="10" disabled type="text" name="historico" class="form-control" placeholder="Histórico"></textarea>
                  </div>


          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Voltar</button>

          </div>
      </form>
    </div>
  </div>
</div>


<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <form id="edit">
          <div class="modal-body">
              <input type="hidden" name="id" value="">
                  <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" class="form-control" placeholder="Nome" required>
                  </div>
                  <div class="form-group">
                    <label for="sigla">Sigla</label>
                    <input type="text" name="sigla" class="form-control"  placeholder="Sigla" required>
                  </div>
                  <div class="form-group">
                    <label for="historico">Histórico</label>
                    <textarea rows="10" type="text" name="historico" class="form-control" placeholder="Histórico"></textarea>
                  </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Salvar alterações</button>
          </div>
      </form>
    </div>
  </div>
</div>






@endsection
