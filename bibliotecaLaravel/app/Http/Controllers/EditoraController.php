<?php

namespace App\Http\Controllers;

use App\Models\Editora;
use Illuminate\Http\Request;

class EditoraController extends Controller{

    public function listar(){
        $editoras = Editora::all();
        return view('listarEditora', compact('editoras'));
    }

    public function add(Request $request){

        $request->validate([
            'editora' => 'required|string|max:255',
            'cnpj' => 'required|integer',
            'pais' => 'required|string|max:255',
            'cidade' => 'required|string|max:255'
        ]);

        Editora::create([
            'editora' => $request->editora,
            'cnpj' => $request->cnpj,
            'pais' => $request->pais,
            'cidade' => $request->cidade
        ]);

        return redirect()->back()->with('success','Editora cadastrada com sucesso!');
    }
}