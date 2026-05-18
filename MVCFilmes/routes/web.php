<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmeController;
use App\Http\Controllers\AutorController;

Route::get('/', function () {
    return view('welcome');
});

// GET - listar os produtos cadastrados
Route::get('/filme/listar',[FilmeController::class, 'listar'])->name('filme.listar');

Route::get('/filme/cadastrar',[FilmeController::class, 'cadastro']
)->name('filme.cadastro');

// POST - enviar os dados para cadastrar usuários
Route::post('/filme/salvar',[FilmeController::class, 'add'])
->name('filme.salvar');

// Tela de Atualizar
Route::get('/filme/{id}/atualizar', [FilmeController::class, 'atualizar'])
->name('filme.atualizar');

Route::put('/filme/{id}/update',[FilmeController::class, 'update'])
->name('filme.update');

Route::delete('/filme/{id}',[FilmeController::class, 'deletar'])
->name('filme.deletar');

// ROTAS Dos Setores

// GET - listar os setores cadastrados
Route::get('/autor/listar',[AutorController::class, 'listar'])->
name('autor.listar');

Route::get('/autor/cadastrar', function(){ 
    return view('cadastroAutor');
})->name('autor.cadastro');

Route::post('/autor/salvar',[AutorController::class, 'add'])
->name('autor.salvar');

Route::get('/autor/{id}/atualizar', [FilmeController::class, 'atualizar'])
->name('autor.atualizar');

Route::put('/autor/{id}/update',[FilmeController::class, 'update'])
->name('autor.update');

Route::delete('/autor/{id}',[FilmeController::class, 'deletar'])
->name('autor.deletar');