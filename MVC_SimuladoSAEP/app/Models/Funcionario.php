<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model{

    protected $fillable = [
        'nome',
        'cargo',
        'email',
        'data_admissao',
        'salario',
        'sobrenome'
    ];    
}