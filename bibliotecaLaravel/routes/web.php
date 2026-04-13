<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\EditoraController;
use App\Http\Controllers\DetalheController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/livro/listar', [LivroController::class, 'listar'])->name('livro.listar');

Route::get('/livro/cadastrar', [LivroController::class, 'create'])->name('livro.cadastro');

Route::post('/livro/salvar', [LivroController::class, 'add'])->name('livro.salvar');

Route::get('/livro/{id}/atualizar', [LivroController::class, 'atualizar'])->name('livro.atualizar');

Route::put('/livro/{id}/update', [LivroController::class, 'update'])->name('livro.update');

Route::delete('/livro/{id}', [LivroController::class, 'deletar'])->name('livro.deletar');



Route::get('/editora/cadastrar', function(){
    return view('cadastroEditora');
})->name('editora.cadastro');

Route::get('/editora/listar', [EditoraController::class, 'listar'])->name('editora.listar');

Route::post('/editora/salvar', [EditoraController::class, 'add'])->name('editora.salvar');



Route::get('/detalhe/cadastrar', function(){
    return view('cadastroDetalhe');
})->name('detalhe.cadastro');

Route::get('/detalhe/listar', [DetalheController::class, 'listar'])->name('detalhe.listar');

Route::post('/detalhe/salvar', [DetalheController::class, 'add'])->name('detalhe.salvar');
