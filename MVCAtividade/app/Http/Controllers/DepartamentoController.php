<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller{

    public function listar(){
        $departamentos = Departamento::all();
        return view('listar', compact('departamentos'));
    }

    public function add(Request $request){
        $request->validate([
            'nome' => 'required|string|max:255',
            'data_criacao' => 'required|integer',
            'orcamento' => 'required|integer',
            'sigla' => 'required|string|max:255'
        ]);

        Departamento::create([
            'nome' => $request->nome,
            'data_criacao' =>  $request->data_criacao,
            'orcamento' =>  $request->orcamento,
            'sigla' =>  $request->sigla
        ]);
        
        return redirect()->back()->with('success','Departamento cadastrado com sucesso!');
    }
}