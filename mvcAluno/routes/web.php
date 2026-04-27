<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\TurmaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/aluno/listar', [AlunoController::class, 'listar'])->name('aluno.listar');

Route::get('/aluno/cadastrar', [AlunoController::class, 'cadastro'])
    ->name('aluno.cadastro');

Route::post('/aluno/salvar', [AlunoController::class, 'add'])->name('aluno.salvar');

Route::get('/aluno/{id}/atualizar', [AlunoController::class, 'atualizar'])->name('aluno.atualizar');

Route::put('/aluno/{id}/update', [AlunoController::class, 'update'])->name('aluno.update');

Route::delete('/aluno/{id}', [AlunoController::class, 'deletar'])->name('aluno.deletar');



Route::get('/turma/cadastrar', function(){
    return view('cadastroTurma');
})->name('turma.cadastroTurma');

Route::post('/turma/salvar', [TurmaController::class, 'add'])->name('turma.salvar');

Route::get('/turma/listar', [TurmaController::class, 'listar'])->name('turma.listar');

Route::get('/turma/{id}/atualizar', [TurmaController::class, 'atualizar'])->name('turma.atualizar');

Route::put('/turma/{id}/update', [TurmaController::class, 'update'])->name('turma.update');

Route::delete('/turma/{id}', [TurmaController::class, 'deletar'])->name('turma.deletar');
