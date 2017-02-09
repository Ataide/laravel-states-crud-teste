@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <div class="title pull-left" style="    margin-top: 7px;">Lista de Estados</div>
                    <div class="ajax-toggle pull-right">
                        Usa AJAX
                        <input type="checkbox" data-toggle="toggle">
                    </div>
                </div>
                <table class="table table-hovered">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Estado</th>
                        <th>Sigla</th>
                        <th>Histórico</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($estados as $estado)
                      <tr>
                        <td>{{ $estado->id}}</td>
                        <td>{{ $estado->nome }}</td>
                        <td>{{ $estado->sigla }}</td>
                        <td>{{ str_limit($estado->historico, $limit = 80, $end = '...') }}</td>

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
