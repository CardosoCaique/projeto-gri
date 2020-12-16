<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pergunta;
use App\Resposta;

class DashController extends Controller
{
    public function redirect()
    {
        $perguntas = Pergunta::all();
        $base = json_decode(file_get_contents("baseResp.json"));
        
        return view('dashboard.show')
            ->with('perguntas', $perguntas)
            ->with('base', $base);
    }
}
