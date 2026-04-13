<?php

namespace App\Http\Controllers;

use App\Models\Detalhe;
use App\Models\Livro;
use Illuminate\Http\Request;

class DetalheController extends Controller{

    public function add(Request $request){

        $request->validate([
            'custo' => 'required|string|max:255',
            'preco_venda' => 'required|string|max:255',
            'imposto' => 'required|string|max:255'
        ]);

        Detalhe::create([
            'custo' => $request->custo,
            'preco_venda' => $request->preco_venda,
            'imposto' => $request->imposto
        ]);

        return redirect()->back()->with('success','Detalhes do Livro cadastrado com sucesso!');
    }

}