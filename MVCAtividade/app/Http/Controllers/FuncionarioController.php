<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\Departamento;
use App\Models\DadoPessoal;
use Illuminate\Http\Request;

class FuncionarioController extends Controller{

    public function create(){
    $departamentos = Departamento::all();
    $dadospessoais = DadoPessoal::all();

    return view('cadastroFuncionario', compact('departamentos', 'dadospessoais'));
}

public function add(Request $request){
    $request->validate([
        'nome' => 'required|string|max:255',
        'cargo' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'data_admissao' => 'required|date',
        'salario' => 'numeric',
        'sobrenome' => 'string|max:255',
        'departamento_id' => 'required|exists:departamentos,id',
    ]);

    Funcionario::create([
        'nome' => $request->nome,
        'cargo' => $request->cargo,
        'email' => $request->email,
        'data_admissao' => $request->data_admissao,
        'salario' => $request->salario,
        'sobrenome' => $request->sobrenome,
        'departamento_id'=> $request->departamento_id,
    ]);

    return redirect()->back()->with('success','Funcionário cadastrado com sucesso!');
}

public function salvar(Request $request, $id){
    $request->validate([
        'nome' => 'required|string|max:255',
        'cargo' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'data_admissao' => 'required|date',
        'salario' => 'numeric',
        'sobrenome' => 'string|max:255',
        'departamento_id' => 'required|exists:departamentos,id',
    ]);

    $funcionario = Funcionario::findOrFail($id);

    $funcionario->update([
        'nome' => $request->nome,
        'cargo' => $request->cargo,
        'email' => $request->email,
        'data_admissao' => $request->data_admissao,
        'salario' => $request->salario,
        'sobrenome' => $request->sobrenome,
        'departamento_id'=> $request->departamento_id,
    ]);

    return redirect()->route('funcionario.listar')
        ->with('success','Funcionário atualizado com sucesso!');
}
}