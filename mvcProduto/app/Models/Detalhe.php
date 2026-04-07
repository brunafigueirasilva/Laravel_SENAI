<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detalhe extends Model
{
    protected $table = 'detalheProduto';

    protected $fillable = [
        'descricao',
        'tamanho',
        'peso',
        'produtos_id'
    ];

    public function produto(){
        return $this->belongsTo(Produto::class, 'produtos_id');
    }
}