<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function cadastrarProduto(Request $request)
    {
        // dd($request);
        return Produto::cadastrarProduto($request->toArray());
        // return Produto::insert($request->toArray());
    }

    public static function pegarProduto($id)
    {
        return Produto::with(['categoria','tecido', 'tamanhos'])->find($id);
        // $produto = Produto::with('categoria', 'tecido')->find($id);
        // return $produto;
        // dd($produto->tecido->nome);
        // return Produto::with(['tamanhos'])->where('id', $id)->get();
    }

    public function pegarProdutos()
    {
        return Produto::with(['categoria', 'tecido'])->get();        
    }
}
