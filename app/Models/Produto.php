<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Produto extends Model
{
    use HasFactory;

    public function categoria()
    {
        return $this->belongsTo(Tecido::class, 'categoria_id');
    }

    public function tecido()
    {
        return $this->belongsTo(Tecido::class, 'tecido_id');
    }

    public function tamanhos()
    {
        return $this->belongsToMany(ProdutoTamanho::class, 'produtos_tamanhos', 'produto_id', 'tamanho_id')
            ->withPivot('quantidade')
            ->withTimestamps();
    }

    public static function cadastrarProduto($request)
    {
        $produto = [
            'categoria_id' => $request['categoria_id'],
            'nome' => $request['nome'],
            'tecido_id' => $request['tecido_id'],
            'descricao' => $request['descricao'],
        ];
        $produto_id = self::insertGetId($produto);

        self::salvarProdutoTamanhos($produto_id, $request['tamanhos']);

        if ($request['preco_venda'] > 0) {
            self::salvarPrecoVendaProduto($produto_id, $request['preco_venda']);
        }
    }

    public static function salvarProdutoTamanhos($produto_id, $tamanhos)
    {
        foreach ($tamanhos as $tamanho) {
            DB::table('produtos_tamanhos')->insert([
                'produto_id' => $produto_id,
                'tamanho_id' => $tamanho
            ]);
        }
    }

    public static function salvarPrecoVendaProduto($produto_id, $preco_venda)
    {
        DB::table('preco_venda_produtos')->insert([
            'produto_id' => $produto_id,
            'preco_venda' => $preco_venda
        ]);
    }
}
