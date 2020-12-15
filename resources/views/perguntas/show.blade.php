@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="td-nome">Nome</th>
                            <th class="td-nome">Pergunta</th>
                            <th>Editar</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($perguntas as $pergunta)
                            <tr>
                                <td class="td-nome">{{ $pergunta->nome }}</td>
                                <td class="td-nome">{{ $pergunta->pergunta }}</td>
                                <td>
                                    <a href="{{ route('editar', $pergunta->id) }}" class="btn btn-warning">Editar</a>
                                </td>
                                <td>
                                    <a href="{{ route('apagar', $pergunta->id) }}" class="btn btn-danger">Excluir</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
