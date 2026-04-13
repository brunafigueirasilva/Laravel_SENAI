<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Editora extends Model{

    protected $table = 'editoras';
    protected $fillable = [
        'editora',
        'cnpj',
        'pais',
        'cidade'
    ];

    public function livros(){
        return $this->hasMany(Livro::class);
    }
}