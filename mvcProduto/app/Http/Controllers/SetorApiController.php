<?php

namespace App\Http\Controllers;

use App\Models\Setores;
use App\Models\Produto;

use Illuminate\Http\Request;

class SetorApiController extends Controller{

    public function listarApi(){
        $setores = Setores::all();
        return response()->json($setores);
    }

    
    public function addApi(Request $request){

        $request->validate([
            'nome' => 'required|string|max:255',
            'ncorredor' => 'required|integer'
        ]);

        Setores::create([
            'nome' => $request->nome,
            'ncorredor' => $request->ncorredor 
        ]);

        return response()->json([
            'message'=> 'Setor criado!',
            'setor'=> $setor
        ], 200);
    }
}
