<?php

namespace App\Http\Controllers;
use App\Models\Produto;
use App\Models\Informacoes;

use Illuminate\Http\Request;

class InformacaoController extends Controller
{
    public function listar(){
        $informacoes = Informacoes::all();
        return view('listarInformacoes', compact('informacoes'));
    }

    public function add(Request $request){

        $request->validate([
            'endereco' => 'required|string|max:255',
            'data' => 'required|date|max:255',
            'idade' => 'required|numeric|max:255',
            'telefone' => 'required|string|max:255'
            // para poder ser nulo ou existir na tabela informacoes
        ]);

        Informacoes::create([
            'endereco' => $request->endereco,
            'data' => $request->data,
            'idade' => $request->idade,
            'telefone' => $request->telefone,
        ]);

        return redirect()->back()->with('success','Informações Cadastradas com sucesso!');

    }
}