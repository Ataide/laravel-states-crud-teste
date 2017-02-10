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
                            <a href="{{ url('/estados/create') }}" type="button" class="btn btn-success">+ Novo</a>
                        @endif
                    </div>
                </div>
                <table class="table table-hovered">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Estado</th>
                        <th>Sigla</th>
                        <th>Histórico</th>
                        <th>Ação</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($estados as $estado)
                      <tr class='click-row' edit-url="{{ url('/login') }}" >
                        <td>{{ $estado->id}}</td>
                        <td>{{ $estado->nome }}</td>
                        <td>{{ $estado->sigla }}</td>
                        <td>{{ str_limit($estado->historico, $limit = 80, $end = '...') }}</td>
                        <td>
                            @if (Auth::user()->can('read'))
                                <a href="{{ url('/estados'.'/'.$estado->id) }}" type="button" class="btn btn-primary">Ver</a>
                            @endif
                            @if (Auth::user()->can('update'))
                                <a href="{{ url('/estados'.'/'.$estado->id.'/edit') }}" type="button" class="btn btn-warning">Editar</a>
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

@endsection
