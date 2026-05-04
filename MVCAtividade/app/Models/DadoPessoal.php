<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DadoPessoal extends Model
{
    protected $table = 'DadosPessoais';

    protected $fillable = [
        'funcionario_id',
        'CPF',
        'RG',
        'data_nascimento',
        'CEP'
    ];

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }
}