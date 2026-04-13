<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use App\Models\Editora;
use App\Models\Detalhe;
use Illuminate\Http\Request;

class LivroController extends Controller{

    public function listar(){
        $livros = Livro::with('editora','detalhe')->get();
        return view('listar', compact('livros'));
    }

    public function create(){
        $editoras = Editora::all();
        $detalhes = Detalhe::all();

    return view('cadastro', compact('editoras','detalhes'));
    }

    public function add(Request $request){

        $request->validate([
            'nome' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'descricao' => 'required|string|max:255',
            'numero_pag' => 'required|string|max:255',
            'data' => 'required|string|max:255',
            'editora_id' => 'required|exists:editoras,id',
            'detalhe_id' => 'required|exists:detalhes,id'
        ]);

        Livro::create([
            'nome' => $request->nome,
            'autor' => $request->autor,
            'descricao' => $request->descricao,
            'numero_pag' => $request->numero_pag,
            'data' => $request->data,
            'editoras_id' => $request->editora_id,
            'detalhes_id' => $request->detalhe_id
        ]);

        return redirect()->back()->with('success','Livro cadastrado com sucesso!');
    }

    public function atualizar($id){
        $livro = Livro::findOrFail($id);
        $editoras = Editora::all();

        return view('atualizar', compact('livro','editoras'));
    }

    public function salvar(Request $request) {

    $request->validate([
        'nome' => 'required|string|max:255',
        'autor' => 'required|string|max:255',
        'descricao' => 'required|string|max:255',
        'numero_pag' => 'required|',
        'data' => 'required|string|max:255',
        'editora_id' => 'required|exists:editoras,id',
        'detalhe_id' => 'required|exists:detalhes,id',
    ]);

    Livro::create([
        'nome' => $request->nome,
        'autor' => $request->autor,
        'descricao' => $request->descricao,
        'numero_pag' => $request->numero_pag,
        'data' => $request->data,
        'editora_id' => $request->editora_id, 
        'detalhe_id' => $request->detalhe_id,  
    ]);

    return redirect()->back()->with('success', 'Livro cadastrado!');
    }
}