<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Setores;
use App\Models\Detalhe;
use Illuminate\Http\Request;

class ProdutoController extends Controller{

    public function listar(){
        $produtos = Produto::with('setor')->get();
        return view('listar', compact('produtos'));
    }

    public function create(){
        $setores = Setores::all();
        $detalhes = Detalhe::all();

    return view('cadastro', compact('setores','detalhes'));
    }

    public function add(Request $request){

        $request->validate([
            'nome' => 'required|string|max:255',
            'quantidade' => 'required|string|max:255',
            'preco' => 'required|string|max:255',
            'setor_id' => 'required|exists:setores,id'
        ]);

        Produto::create([
            'nome' => $request->nome,
            'quantidade' => $request->quantidade,
            'preco' => $request->preco,
            'setor_id' => $request->setor_id
        ]);

        return redirect()->back()->with('success','Produto cadastrado com sucesso!');
    }

    public function atualizar($id){
        $produto = Produto::findOrFail($id);
        $setores = Setores::all();

        return view('atualizar', compact('produto','setores'));
    }

    public function update(Request $request, $id){

        $request->validate([
            'nome' => 'required|string|max:255',
            'quantidade' => 'required|string|max:255',
            'preco' => 'required|string|max:255',
            'setor_id' => 'required|exists:setores,id' // 🔥 importante
        ]);

        $produto = Produto::findOrFail($id);

        $produto->update([
            'nome' => $request->nome,
            'quantidade' => $request->quantidade,
            'preco' => $request->preco,
            'setor_id' => $request->setor_id
        ]);

        return redirect()->route('produto.listar')->with('success','Produto atualizado com sucesso!');
    }

    public function deletar($id){
        $produto = Produto::findOrFail($id);
        $produto->delete();

        return redirect()->route('produto.listar')->with('success','Produto excluído com sucesso!');
    }
}