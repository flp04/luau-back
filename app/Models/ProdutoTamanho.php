<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoTamanho extends Model
{
    use HasFactory;

    protected $table = 'produtos_tamanhos';

    // public function produtos()
    // {
    //     return $this->belongsToMany(Produto::class, 'produtos_tamanhos', 'tamanho_id', 'produto_id')
    //         ->withPivot('quantidade');
    // }
}
