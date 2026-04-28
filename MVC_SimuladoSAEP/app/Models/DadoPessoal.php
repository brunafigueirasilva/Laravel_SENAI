<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DadoPessoal extends Model{
    protected $table = "dadospessoais";

    protected $fillable = [
        'CPF',
        'RG',
        'data_nascimento',
        'CEP',
    ];
}