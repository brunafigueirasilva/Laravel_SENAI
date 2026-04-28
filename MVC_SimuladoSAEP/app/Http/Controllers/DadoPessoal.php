<?php

namespace App\Http\Controllers;

use App\Models\DadoPessoal;
use App\Models\Funcionario;
use Illuminate\Http\Request;

class DadoPessoalController extends Controller{

    public function add(Request $request){

        $request->validate([
            'CPF' => 'required|numeric',
            'RG' => 'required|numeric',
            'data_nascimento' => 'required|numeric',
            'CEP' => 'required|numeric'
        ]);

        Detalhe::create([
            'CPF' => $request->CPF,
            'RG' => $request->RG,
            'data_nascimento' => $request->data_nascimento,
            'CEP' => $request->CEP
        ]);

        return redirect()->back()->with('success','Dados Pessoais do Funcionário cadastrado com sucesso!');
    }

}