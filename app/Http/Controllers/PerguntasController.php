<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pergunta;

class PerguntasController extends Controller
{
    protected function store(Request $request, Pergunta $pergunta)
    {
        $pergunta = new Pergunta();

        $pergunta->nome = $request->input('nome');
        $pergunta->pergunta = $request->input('pergunta');

        $pergunta->save();

        return redirect()->route('show');
    }

    public function show()
    {
        $perguntas = Pergunta::all();

        return view('perguntas.show')
            ->with('perguntas', $perguntas);
    }

    public function editar($id)
    {
        $pergunta = Pergunta::find($id);

        return view('perguntas.edit')
            ->with('pergunta', $pergunta);
    }

    protected function update(Request $request, $id)
    {
        $pergunta = Pergunta::find($id);

        $pergunta->nome = $request->input('nome');
        $pergunta->pergunta = $request->input('pergunta');

        $pergunta->save();

        return redirect()->route('show');
    }

    protected function apagar($id)
    {
        $pergunta = Pergunta::find($id);
        $pergunta->delete();

        return redirect()->route('show');
    }
}
