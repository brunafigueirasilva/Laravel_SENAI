<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model{

    protected $fillable = [
        'nome',
        'quantidade',
        'preco',
        'setor_id'
    ];

    public function setor(){
        return $this->belongsTo(Setores::class);
    }

    public function detalhe(){
        return $this->hasOne(Detalhe::class, 'produtos_id');
    }
}