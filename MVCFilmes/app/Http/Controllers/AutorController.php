<?php

namespace App\Http\Controllers;
use App\Models\Autor;
use App\Models\Autors;

use Illuminate\Http\Request;

class AutorController extends Controller
{
    public function listar(){
        $autors = Autors::all();
        return view('listarAutors', compact('autors'));
    }

    public function add(Request $request){

        $request->validate([
            'nome' => 'required|string|max:255',
            'data_nascimento' => 'required|date',
            'email' => 'required|string',
            'telefone' => 'required|numeric',
            // para poder ser nulo ou existir na tabela autors
        ]);

        Autors::create([
            'nome' => $request->nome,
            'data_nascimento' => $request->data_nascimento,
            'email' => $request->email,
            'telefone' => $request->telefone
        ]);

        return redirect()->back()->with('success','Autor Cadastrado com sucesso!');

    }

    public function atualizar($id){
        $autor = Autor::findOrFail($id); // Busca o autor pelo ID
        $autors = Autors::get();
        // select * from filmes where id = $id
        return view('atualizarFilme', compact('filme','autors'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nome' => 'required|string|max:255',
            'data_nascimento' => 'required|date',
            'email' => 'required|string',
            'telefone' => 'required|numeric'
        ]);

        $autor = Autor::findOrFail($id); // buscar aluno para ser atualizado

        $autor->nome = $request->nome; // atualizando o campo nome
        $autor->data_nascimento = $request->data_nascimento; // atualizando o campo data_nascimento
        $autor->email = $request->email; // atualizando o campo email
        $autor->telefone = $request->telefone; // atualizando o campo telefone

        $autor->save(); // salvando no banco de dados(fazendo update)

        return redirect()->back()->with('success','Autor atualizado com suceso');
    }

   public function deletar($id){
        $autor = Autor::findOrFail($id); // buscar o autor para depois deletar
        $autor->delete(); // faz o delete no banco de dados

        return redirect()->route('autor.listar')
            ->with('success','Autor excluído com sucesso!');
   }   

}