<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DadoPessoal extends Model
{
    protected $table = 'dados_pessoais';

    protected $fillable = [
        'funcionario_id',
        'cpf',
        'telefone',
        'endereco'
    ];

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }
}