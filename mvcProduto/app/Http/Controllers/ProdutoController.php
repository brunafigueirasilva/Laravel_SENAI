<?php

namespace App\Http\Controllers;
use App\Models\Produto;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function listar() {
        $query = Produto::query();
        $produtos = $query->get();
        return view('listar', compact ('produtos'));
    }

    public function add(Request $request){

    $request->validate([
        'nome'=> 'required|string|max:255',
        'quantidade'=> 'required|int',
        'preco'=> 'required|int'     
    ]);

    Produto::create([
        'nome'=>$request->nome,
        'quantidade'=>$request->quantidade,
        'preco'=>$request->preco
    ]);

    return redirect()->back()->with('success','Produto Cadastrado com sucesso!');
    }

    public function atualizar ($id){
        $produto = Produto::findOrFail($id);
        return view('atualizar', compact('produto'));
    }

    public function update (Request $request, $id){
        $request->validate([
            'nome'=> 'required|string|max:255',
            'quantidade'=> 'required|int',
            'preco'=> 'required|int'
        ]);

        $produto = Produto::findOrFail($id);

        $produto->nome = $request->nome;
        $produto->quantidade = $request->quantidade;
        $produto->preco = $request->preco;

        $produto->save();
        return redirect()->back()->with('success','Produto Atualizado com sucesso!'); 
            
    }
}