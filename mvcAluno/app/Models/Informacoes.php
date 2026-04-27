<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Informacoes extends Model
{
    protected $fillable = [
        'endereco',
        'idade',
        'data',
        'telefone'
    ];

    public function aluno(){
        return $this->hasMany(Alunos::class);
    }
}