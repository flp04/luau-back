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
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function tecido()
    {
        return $this->belongsTo(Tecido::class, 'tecido_id');
    }

    public function tamanhos()
    {
        return $this->belongsToMany(Tamanho::class, 'produtos_tamanhos', 'produto_id', 'tamanho_id')
            ->withPivot('quantidade');
    }

    public function produtosTamanhos()
    {
        return $this->hasMany(ProdutosTamanhos::class, 'produto_id');
    }

    // public function precosVenda()
    // {
    //     return $this->hasMany(PrecoVendaProduto::class, 'produto_id');
    // }
    
    // public function tamanhos()
    // {
    //     return $this->belongsTo(ProdutoTamanho::class, 'produtos_tamanhos', 'produto_id', 'tamanho_id')
    //         ->withPivot('quantidade')
    //         ->withTimestamps();
    // }

    public static function cadastrarProduto($request)
    {
        $produto = [
            'categoria_id' => $request['categoria_id'],
            'nome' => $request['nome'],
            'tecido_id' => $request['tecido_id'],
            'descricao' => $request['descricao'],
            'preco_venda' => $request['preco_venda'],
        ];
        
        $produto_id = self::insertGetId($produto);

        self::salvarProdutoTamanhos($produto_id, $request['tamanhos']);

    }

    public static function atualizarProduto($id, $request)
    {
        $produto = self::find($id);

        $produto->categoria_id = $request['categoria_id'];
        $produto->nome = $request['nome'];
        $produto->tecido_id = $request['tecido_id'];
        $produto->descricao = $request['descricao'];
        $produto->preco_venda = $request['preco_venda'];

        $produto->save();
        
        // $produto =
        // if ($request['preco_venda'] > 0) {
        //     self::salvarPrecoVendaProduto($id, $request['preco_venda']);
        // }
        // $produto = [
        //     'categoria_id' => $request['categoria_id'],
        //     'nome' => $request['nome'],
        //     'tecido_id' => $request['tecido_id'],
        //     'descricao' => $request['descricao'],
        //     'preco_venda' => $request['preco_venda'],
        // ];
        

        // self::salvarProdutoTamanhos($produto_id, $request['tamanhos']);

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
