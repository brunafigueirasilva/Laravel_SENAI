<?php

namespace App\Http\Controllers;
use App\Models\Aluno;
use App\Models\Turma; 

use Illuminate\Http\Request;

class AlunoController extends Controller {

    public function listar() {
        // $query = Aluno::query();
        // $alunos = $query->get();
        $alunos = Aluno::with('turma')->get();
        return view('listar', compact('alunos'));
    }
    
    public function add(Request $request){

    $request->validate([
        'nome'=> 'required|string|max:255',
        'email'=> 'required|string|max:255|unique:alunos,email',
        'turma_id'=> 'nullable|exists:turmas,id'
    ]);

    Aluno::create([
        'nome'=>$request->nome,
        'email'=>$request->email,
        'turma_id'=>$request->turma_id
    ]);

    return redirect()->back()->with('success','Aluno Cadastrado com sucesso!');
    }

    public function atualizar ($id){
        $aluno = Aluno::findOrFail($id);
        $turmas = Turma::all();

    return view('atualizar', compact('aluno', 'turmas'));
    }

    public function update (Request $request, $id){
        $request->validate([
            'nome'=>'required|string|max:255',
            'email'=>"required|string|max:255|unique:alunos,email,$id"
        ]);

        $aluno = Aluno::findOrFail($id);

        $aluno->nome = $request->nome;
        $aluno->email = $request->email;

        $aluno->save();
        return redirect()->back()->with('success','Aluno Atualizado com sucesso!'); 
    }

    public function deletar($id){
        $aluno = Aluno::findOrFail($id);
        $aluno->delete();

        return redirect()->route('aluno.listar')->with('success', 'Aluno excluído com sucesso!');
    }

    public function cadastro(){
    $turmas = Turma::all();
    return view('cadastro', compact('turmas'));
    }
}