<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\DadoPessoalController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/funcionario/listar', [FuncionarioController::class, 'listar'])->name('funcionario.listar');

Route::get('/funcionario/cadastrar', [FuncionarioController::class, 'create'])->name('funcionario.cadastro');

Route::post('/funcionario/salvar', [FuncionarioController::class, 'add'])->name('funcionario.salvar');

Route::get('/funcionario/{id}/atualizar', [FuncionarioController::class, 'atualizar'])->name('funcionario.atualizar');

Route::put('/funcionario/{id}/update', [FuncionarioController::class, 'update'])->name('funcionario.update');


Route::get('/departamento/cadastrar', function(){
    return view('cadastroDepartamento');
})->name('departamento.cadastro');

Route::get('/departamento/listar', [DepartamentoController::class, 'listar'])->name('departamento.listar'); 

Route::post('/departamento/salvar', [DepartamentoController::class, 'add'])->name('departamento.salvar');

Route::get('/departamento/{id}/atualizar', [DepartamentoController::class, 'atualizar'])->name('departamento.atualizar');

Route::put('/departamento/{id}/update', [DepartamentoController::class, 'update'])->name('departamento.update');


Route::get('/dadopessoal/cadastrar', function(){
    return view('cadastrodadopessoal');
})->name('dadopessoal.cadastro');

Route::get('/dadopessoal/listar', [DadoPessoalController::class, 'listar'])->name('dadopessoal.listar'); 

Route::post('/dadopessoal/salvar', [DadoPessoalController::class, 'add'])->name('dadopessoal.salvar');

Route::get('/dadopessoal/{id}/atualizar', [DadoPessoalController::class, 'atualizar'])->name('dadopessoal.atualizar');

Route::put('/dadopessoal/{id}/update', [DadoPessoalController::class, 'update'])->name('dadopessoal.update');
