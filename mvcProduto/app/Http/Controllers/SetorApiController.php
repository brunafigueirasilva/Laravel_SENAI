<?php

namespace App\Http\Controllers;

use App\Models\Setores;
use Illuminate\Http\Request;

class SetorApiController extends Controller
{
    // CORRIGIDO: Adicionado o parâmetro Request $request
    public function listarApi(Request $request){
        try {
            $query = Setores::query();

            if ($request->filled('nome')){
                $query->where('nome', 'like', '%'.$request->nome.'%');        
            }

            if ($request->filled('num_setor')){
                $query->where('num_setor', $request->num_setor);        
            }

            $setores = $query->get();

            return response()->json([
                'success' => true,
                'data' => $setores,
            ], 200);

        } catch (\Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Erro interno no servidor',
                'errors' => $e->getMessage(), // CORRIGIDO: Era $e-getMessage()
            ], 500);
        }
    }

    public function addApi(Request $request){
        try {
            $request->validate([
                'nome' => 'required|string|max:255',
                'num_setor' => 'required|numeric', // DICA: Tirado o max:255 se for número sequencial grande, mas mantido se for limite de tamanho.
            ]);

            $setor = Setores::create([
                'nome' => $request->nome,
                'num_setor' => $request->num_setor
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Setor Criado',
                'setor' => $setor
            ], 201);

        } catch(\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro de Validação',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Erro interno no servidor',
                'errors' => $e->getMessage(), // CORRIGIDO: Mudado de errors() para getMessage()
            ], 500);
        }
    }

    public function updateApi(Request $request, $id){
        try {
            $request->validate([
                'nome' => 'required|string|max:255',
                'num_setor' => 'required|numeric', 
            ]);

            $setor = Setores::findOrFail($id);

            $setor->nome = $request->nome;
            $setor->num_setor = $request->num_setor;
            $setor->save();

            return response()->json([
                'success' => true, // DICA: Adicionado para manter o padrão das suas outras respostas
                'message' => "Setor atualizado!",
                'setor' => $setor
            ], 200);

        } catch(\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro de Validação',
                'errors' => $e->errors()
            ], 422);
        } catch(\Illuminate\Database\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Setor não encontrado!',
                'errors' => $e->getMessage() // CORRIGIDO: Mudado de errors() para getMessage()
            ], 404);
        } catch (\Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Erro interno no servidor',
                'errors' => $e->getMessage(), // CORRIGIDO: Mudado de errors() para getMessage()
            ], 500);
        }
    }

    public function deletar($id){
        try {
            $setor = Setores::findOrFail($id);
            $setor->delete();

            return response()->json([
                'success' => true, // DICA: Adicionado para manter o padrão
                'message' => "Setor deletado!",
            ], 200);

        } catch(\Illuminate\Database\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Setor não encontrado!',
                'errors' => $e->getMessage() // CORRIGIDO: Mudado de errors() para getMessage()
            ], 404);
        } catch (\Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Erro interno no servidor',
                'errors' => $e->getMessage(), // CORRIGIDO: Mudado de errors() para getMessage()
            ], 500);
        }
    }
}