<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoTamanho extends Model
{
    use HasFactory;

    protected $table = 'produtos_tamanhos';

    public static function setQuantidade($item)
    {
        $produto = self::where('produto_id', $item['produto_id'])->get();
        $produto->quantidade = $item;
        $produto->save();
    }

    // public function produtos()
    // {
    //     return $this->belongsTo(Produto::class, 'produtos_tamanhos', 'tamanho_id', 'produto_id')
    //         ->withPivot('quantidade');
    // }
}
