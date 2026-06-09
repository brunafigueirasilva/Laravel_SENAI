<?php

namespace App\Http\Controllers;

use App\Models\Produto; 
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;

class ProdutoApiController extends Controller
{
    public function listarApi(Request $request)
    {
        try {
            // Usando a Model correta (Produto)
            $query = Produto::query();

            if ($request->filled('nome')) {
                $query->where('nome', 'like', '%' . $request->nome . '%');
            }
            
            if ($request->filled('quantidade')) {
                $query->where('quantidade', $request->quantidade);
            }
            
            if ($request->filled('tipo_materia')) {
                $query->where('tipo_materia', 'like', '%' . $request->tipo_materia . '%');
            }

            if ($request->filled('data_fabricacao')) {
                $query->where('data_fabricacao', $request->data_fabricacao);
            }
            
            if ($request->filled('especificacoes')) {
                $query->where('especificacoes', 'like', '%' . $request->especificacoes . '%');
            }
            
            if ($request->filled('preco_venda')) {
                $query->where('preco_venda', 'like', '%' . $request->preco_venda . '%');
            }

            $produtos = $query->get();

            return response()->json([
                'success' => true,
                'data' => $produtos
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro interno do servidor',
                'errors' => $e->getMessage()
            ], 500);
        }
    }

    public function addApi(Request $request)
    {
        try {
            $dadosValidados = $request->validate([
                'nome' => 'required|string|max:255',
                'tipo_materia' => 'required|string|max:255',
                'data_fabricacao' => 'required|date',
                'especificacoes' => 'required|string|max:255',
                'quantidade' => 'required|numeric',
                'preco_venda' => 'required|numeric'
            ]);

            $produto = Produto::create($dadosValidados);

            return response()->json([
                'success' => true,
                'message' => 'Produto Criado',
                'produto' => $produto
            ], 201); 

        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro de validação',
                'errors' => $e->errors()
            ], 422);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro interno do servidor',
                'errors' => $e->getMessage()
            ], 500);
        }
    }

    public function updateApi(Request $request, $id)
    {
        try {
            $request->validate([
                'nome' => 'required|string|max:255',
                'tipo_materia' => 'required|string|max:255',
                'data_fabricacao' => 'required|date',
                'especificacoes' => 'required|string|max:255',
                'quantidade' => 'required|numeric',
                'preco_venda' => 'required|numeric'
            ]);

            $produto = Produto::findOrFail($id); 

            $produto->nome = $request->nome;
            $produto->tipo_materia = $request->tipo_materia;
            $produto->data_fabricacao = $request->data_fabricacao;
            $produto->especificacoes = $request->especificacoes;
            $produto->quantidade = $request->quantidade;
            $produto->preco_venda = $request->preco_venda;

            $produto->save(); 

            return response()->json([
                'success' => true,
                'message' => "Produto atualizado!",
                'produto' => $produto
            ], 200);

        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro de validação',
                'errors' => $e->errors()
            ], 422);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Produto não encontrado'
            ], 404);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro interno do servidor',
                'errors' => $e->getMessage()
            ], 500);
        }
    }

    public function deletarApi($id)
    {
        try {
            $produto = Produto::findOrFail($id); 
            $produto->delete(); 

            return response()->json([
                'success' => true,
                'message' => "Produto Deletado com Sucesso!",
            ], 200);

        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Produto não encontrado'
            ], 404);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro interno do servidor',
                'errors' => $e->getMessage()
            ], 500);
        }
    }
}