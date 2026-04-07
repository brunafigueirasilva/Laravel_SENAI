<?php

namespace App\Http\Controllers;

use App\Models\Setores;
use Illuminate\Http\Request;

class SetorController extends Controller{

    public function listar(){
        $setores = Setores::all();
        return view('listarSetor', compact('setores'));
    }

    public function add(Request $request){

        $request->validate([
            'nome' => 'required|string|max:255',
            'ncorredor' => 'required|integer'
        ]);

        Setores::create([
            'nome' => $request->nome,
            'ncorredor' => $request->ncorredor 
        ]);

        return redirect()->back()->with('success','Setor cadastrado com sucesso!');
    }
}