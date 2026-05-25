<?php

namespace App\Http\Controllers;
use App\Models\Filmes;

use Illuminate\Http\Request;

class FilmeApiController extends Controller
{
    public function listarApi(){
        $filmes = Filmes::all();
        return response()->json($filmes);
    }

    // estou no SetorApiController.php
    public function addApi(Request $request){

        $request->validate([
            'titulo' => 'required|string|max:255',
            'data_lancamento' => 'required|numeric',
            'sinopse' => 'required|string|max:255',
            'genero' => 'required|string|max:255',
            'orcamento' => 'required|numeric',
            'autor_id' => 'nullable|exists:autors,id' 
            // para poder ser nulo ou existir na tabela filmes
        ]);

        $filme = Filmes::create([
            'titulo' => $request->titulo, // atualizando o campo titulo
            'data_lancamento' => $request->data_lancamento, // atualizando o campo data_lancamento
            'sinopse' => $request->sinopse, // atualizando o campo sinops
            'genero' => $request->genero, // atualizando o campo genero
            'orcamento' => $request->orcamento
        ]);

        return response()->json([
            'message' => 'Autor Criado',
            'filme' => $filme
        ], 200);
    }

    public function updateApi(Request $request, $id){
        $request->validate([
            'titulo' => 'required|string|max:255',
            'data_lancamento' => 'required|numeric',
            'sinopse' => 'required|string|max:255',
            'genero' => 'required|string|max:255',
            'orcamento' => 'required|numeric',
            'autor_id' => 'nullable|exists:autors,id' 
        ]);

        $filme = Filmes::findOrFail($id); // buscar filme para ser atualizado

        $filme->titulo = $request->titulo; // atualizando o campo nome
        $filme->data_lancamento = $request->data_lancamento; // atualizando o campo num_setor
        $filme->sinopse = $request->sinopse; // atualizando o campo nome
        $filme->genero = $request->genero;
        $filme->orcamento = $request->orcamento; // atualizando o campo nome
        $filme->autor_id = $request->autor_id;

        $filme->save(); // salvanautor_iddados(fazendo updateApi)

        return response()->json([
            'message' => "Filme atualizado!",
            'filme' => $filme
        ], 200);
    }

    public function deletar($id){
        $filme = Filmes::findOrFail($id); // buscar o filme para depois deletar
        $filme->delete(); //php  faz o delete no banco de dados

         return response()->json([
            'message' => "Filme deletado!",
        ], 200);
      
    }

}