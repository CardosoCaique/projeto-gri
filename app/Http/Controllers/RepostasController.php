<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pergunta;
use App\Resposta;

class RepostasController extends Controller
{
	public function editar($id)
    {
    	$perguntas = Pergunta::all();

    	$base = json_decode(file_get_contents("baseResp.json"));

        return view('dashboard.edit')
            ->with('perguntas', $perguntas)
            ->with('base', $base)
            ->with('id', $id);
    }

    protected function apagar($id)
    {
 		$data = file_get_contents('baseResp.json');
		$data = json_decode($data, true);
 
		unset($data[$id]);
 
		//encode back to json
		$data = json_encode($data, JSON_PRETTY_PRINT);
		file_put_contents('baseResp.json', $data);

        return redirect()->route('show');
    }

    protected function update(Request $request, $id)
    {
    	$perguntas = Pergunta::all();

    	$data = file_get_contents('baseResp.json');
 		$data_array = json_decode($data, true);

        $update_arr = array(
		'perguntaUm' => $request->input('perguntaUm'),
		'perguntaDois' => $request->input('perguntaDois'),
		'perguntaTres' => $request->input('perguntaTres'),
		'perguntaQuatro' => $request->input('perguntaQuatro'),
		'perguntaCinco' => $request->input('perguntaCinco'),
		'perguntaSeis' => $request->input('perguntaSeis'),
		'perguntaSete' => $request->input('perguntaSete'),
		'perguntaOito' => $request->input('perguntaOito'),
		'perguntaNove' => $request->input('perguntaNove'),
		'perguntaDez' => $request->input('perguntaDez')
		);
		 
		$data_array[$id] = $update_arr;
		 
		$data = json_encode($data_array, JSON_PRETTY_PRINT);
		file_put_contents('baseResp.json', $data);

        return redirect()->route('show');
    }
}
