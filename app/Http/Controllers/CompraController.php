<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\ItensCompra;
use App\Models\ProdutoTamanho;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    public function cadastrarCompra (Request $request)
    {
        $form_request = $request->all();
        if($form_request['compra']['forma_envio'] == 0) {
            $form_request['compra']['status'] = 'Entregue';
        } else {
            $form_request['compra']['status'] = 'Pedido';
        }
        $form_request['compra']['created_at'] = now();
        $compra_id = Compra::insertGetId($form_request['compra']);
        foreach ($form_request['itens_compra'] as $item){
            $item['compra_id'] = $compra_id;
            ItensCompra::insert($item);
            ProdutoTamanho::where('produto_id', $item['produto_id'])
                ->where('tamanho_id', $item['tamanho_id'])
                ->update(['quantidade' => $item['quantidade']]);
        }
        return $form_request;
    }

    public function pegarCompras (Request $request)
    {
        $compras = Compra::with(['fornecedor', 'formaPagamento'])->get();
        foreach ($compras as $compra) {
            if ($compra['forma_envio'] == 0) {
                $compra['forma_envio'] = 'Retirada';
            } else {
                $compra['forma_envio'] = 'Entrega';
            }
        }
        return $compras;
    }

    public function pegarCompra ($id)
    {
        $compra = Compra::with(['fornecedor', 'formaPagamento', 'itens', 'itens.produto', 'itens.tamanho'])->find($id);
        // foreach ($compras as $compra) {
            if ($compra['forma_envio'] == 0) {
                $compra['forma_envio'] = 'Retirada';
            } else {
                $compra['forma_envio'] = 'Entrega';
            }
        // }
        return $compra;
    }
}
