<?php

namespace App\Http\Controllers;

use App\Models\DadoPessoal;
use App\Models\DadoPesso;
use Illuminate\Http\Request;

class DadoPessoalController extends Controller{

    public function listar(){
        $dadospessoais = DadoPessoal::with('dadopessoal')->get();
        return view ('listarDadoPessoal', compact ('dadospessoais'));
    }

    public function add(Request $request){

        $request->validate([
            'CPF' => 'required',
            'RG' => 'required',
            'data_nascimento' => 'required',
            'CEP' => 'required'
        ]);

        DadoPessoal::create([
            'CPF' => $request->CPF,
            'RG' => $request->RG,
            'data_nascimento' => $request->data_nascimento,
            'CEP' => $request->CEP
        ]);

        return redirect()->back()->with('success','Dados Pessoais do Funcionário cadastrado com sucesso!');
    }

}