<?php

namespace App\Http\Controllers;

use App\Models\Detalhe;
use App\Models\Produto;
use Illuminate\Http\Request;

class DetalheController extends Controller{

    public function listar(){
        $detalhes = Detalhe::with('produto')->get();
        return view('listarDetalhe', compact('detalhes'));
    }

    public function add(Request $request){

        $request->validate([
            'descricao' => 'required|string|max:255',
            'tamanho' => 'required|string|max:255',
            'peso' => 'required|string|max:255'
        ]);

        Detalhe::create([
            'descricao' => $request->descricao,
            'tamanho' => $request->tamanho,
            'peso' => $request->peso,
            'produtos_id' => $request->produtos_id
        ]);

        return redirect()->back()->with('success','Detalhes do Produto cadastrado com sucesso!');
    }

}