<?php

namespace App\Http\Controllers;
use App\Models\Filme;
use App\Models\Autors;
//use App\Models\DetalheProdutos;

use Illuminate\Http\Request;

class FilmeController extends Controller
{
    public function listar(){
        $filmes = Filme::with(['autor'])->get();
        return view('listarFilmes', compact('filmes'));
    }

    public function cadastro(){
        $autors = Autors::get();
        return view('cadastroFilme', compact('autors'));
    }

    public function add(Request $request){

        $request->validate([
            'titulo' => 'required|string|max:255',
            'data_lancamento' => 'required|date',
            'sinopse' => 'required|string|max:255',
            'genero' => 'required|string|max:255',
            'orcamento' => 'required|numeric',
            'autor_id' => 'nullable|exists:autors,id' 
        ]);

        $filme = Filme::create([
            'titulo' => $request->titulo,
            'data_lancamento' => $request->data_lancamento,
            'sinopse' => $request->sinopse,
            'genero' => $request->genero,
            'orcamento' => $request->orcamento,
            'autor_id' => $request->autor 
        ]);

        return redirect()->back()->with('success','Filme Cadastrado com sucesso!');

    }

    public function atualizar($id){
        $filme = Filme::findOrFail($id); // Busca o filme pelo ID
        $autors = Autors::get();
        // select * from filmes where id = $id
        return view('atualizarFilme', compact('filme','autors'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'titulo' => 'required|string|max:255',
            'data_lancamento' => 'required|numeric',
            'sinopse' => 'required|string|max:255',
            'genero' => 'required|string|max:255',
            'orcamento' => 'required|numeric',
            'autor_id' => 'nullable|exists:autors,id' 
        ]);

        $filme = Filme::findOrFail($id); // buscar aluno para ser atualizado

        $filme->titulo = $request->titulo; // atualizando o campo titulo
        $filme->data_lancamento = $request->data_lancamento; // atualizando o campo data_lancamento
        $filme->sinopse = $request->sinopse; // atualizando o campo sinopse
        $filme->genero = $request->genero; // atualizando o campo genero
        $filme->orcamento = $request->orcamento;

        $filme->save(); // salvando no banco de dados(fazendo update)

        return redirect()->back()->with('success','Filme atualizado com suceso');
    }

   public function deletar($id){
        $filme = Filme::findOrFail($id); // buscar o filme para depois deletar
        $filme->delete(); // faz o delete no banco de dados
        $filme->deletar();

        return redirect()->route('filme.listar')
            ->with('success','Filme excluído com sucesso!');
   }   

}