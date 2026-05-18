<?php
// estou no SetorApiController.php
namespace App\Http\Controllers;
use App\Models\Autors;

use Illuminate\Http\Request;

class AutorApiController extends Controller
{
    public function listarApi(){
        $autors = Autors::all();
        return response()->json($autors);
    }

    // estou no SetorApiController.php
    public function addApi(Request $request){

        $request->validate([
            'nome' => 'required|string|max:255',
            'data_nascimento' => 'required|numeric',
            'email' => 'required|string',
            'telefone' => 'required|numeric',
            // para poder ser nulo ou existir na tabela autors
        ]);

        $autor = Autors::create([
             'nome' => $request->nome,
            'data_nascimento' => $request->data_nascimento,
            'email' => $request->email,
            'telefone' => $request->telefone
        ]);

        return response()->json([
            'message' => 'Autor Criado',
            'autor' => $autor
        ], 200);
    }

    public function updateApi(Request $request, $id){
        $request->validate([
            'nome' => 'required|string|max:255',
            'data_nascimento' => 'required|numeric',
            'email' => 'required|string',
            'telefone' => 'required|numeric',
        ]);

        $autor = Autors::findOrFail($id); // buscar autor para ser atualizado

        $autor->nome = $request->nome; // atualizando o campo nome
        $autor->data_nascimento = $request->data_nascimento; 
        $autor->email = $request->email; // atualizando o campo nome
        $autor->telefone = $request->telefone;// atualizando o campo num_setor

        $autor->save(); // salvando no banco de dados(fazendo updateApi)

        return response()->json([
            'message' => "Autor atualizado!",
            'autor' => $autor
        ], 200);
    }

    public function deletar($id){
        $autor = Autors::findOrFail($id); // buscar o autor para depois deletar
        $autor->delete(); // faz o delete no banco de dados

         return response()->json([
            'message' => "Autor deletado!",
        ], 200);
      
    }

}