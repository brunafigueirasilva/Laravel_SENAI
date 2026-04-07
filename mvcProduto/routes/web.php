<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SetorController;
use App\Http\Controllers\DetalheController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/produto/listar', [ProdutoController::class, 'listar'])->name('produto.listar');

Route::get('/produto/cadastrar', [ProdutoController::class, 'create'])->name('produto.cadastro');

Route::post('/produto/salvar', [ProdutoController::class, 'add'])->name('produto.salvar');

Route::get('/produto/{id}/atualizar', [ProdutoController::class, 'atualizar'])->name('produto.atualizar');

Route::put('/produto/{id}/update', [ProdutoController::class, 'update'])->name('produto.update');

Route::delete('/produto/{id}', [ProdutoController::class, 'deletar'])->name('produto.deletar');


Route::get('/setor/cadastrar', function(){
    return view('cadastroSetor');
})->name('setor.cadastro');

Route::post('/setor/salvar', [SetorController::class, 'add'])->name('setor.salvar');


Route::get('/detalhe/cadastrar', function(){
    return view('cadastroDetalhe');
})->name('detalhe.cadastro');

Route::get('/detalhe/listar', [DetalheController::class, 'listar'])->name('detalhe.listar'); 

Route::post('/detalhe/salvar', [DetalheController::class, 'add'])->name('detalhe.salvar');