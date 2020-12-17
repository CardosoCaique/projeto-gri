@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('atualizarjs', $id) }}" method="POST">
                    @csrf <!-- {{ csrf_field() }} -->
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> {{ $perguntas[0]->pergunta }} </label>
                                    <input type="text" name="perguntaUm" value="{{ $base[$id]->perguntaUm }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> {{ $perguntas[1]->pergunta }} </label>
                                    <input type="text" name="perguntaDois" value="{{ $base[$id]->perguntaDois }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> {{ $perguntas[2]->pergunta }} </label>
                                    <input type="text" name="perguntaTres" value="{{ $base[$id]->perguntaTres }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> {{ $perguntas[3]->pergunta }} </label>
                                    <input type="text" name="ptDois" value="{{ $base[$id]->ptDois }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> {{ $perguntas[4]->pergunta }} </label>
                                    <input type="text" name="perguntaQuatro" value="{{ $base[$id]->perguntaQuatro }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> {{ $perguntas[5]->pergunta }} </label>
                                    <input type="text" name="perguntaCinco" value="{{ $base[$id]->perguntaCinco }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> {{ $perguntas[6]->pergunta }} </label>
                                    <input type="text" name="perguntaSeis" value="{{ $base[$id]->perguntaSeis }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> {{ $perguntas[7]->pergunta }} </label>
                                    <input type="text" name="perguntaSete" value="{{ $base[$id]->perguntaSete }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> {{ $perguntas[8]->pergunta }} </label>
                                    <input type="text" name="perguntaOito" value="{{ $base[$id]->perguntaOito }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> {{ $perguntas[9]->pergunta }} </label>
                                    <input type="text" name="perguntaNove" value="{{ $base[$id]->perguntaNove }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> {{ $perguntas[10]->pergunta }} </label>
                                    <input type="text" name="perguntaDez" value="{{ $base[$id]->perguntaDez }}" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <button class="btn btn-success">Salvar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
