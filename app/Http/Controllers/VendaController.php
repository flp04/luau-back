<?php

namespace App\Http\Controllers;

use App\Models\ItensVenda;
use App\Models\Parcelamento;
use App\Models\Venda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VendaController extends Controller
{
    public function cadastrarVenda (Request $request)
    {
        $form_request = $request->all();
        $form_request['venda']['status'] = 'Pedido';
        $form_request['venda']['created_at'] = now();
        $venda_id = Venda::insertGetId($form_request['venda']);
        foreach ($form_request['itens_venda'] as $item) {
            $item['venda_id'] = $venda_id;
            unset($item['tamanhos']);
            ItensVenda::insert($item);
        }
        if($form_request['venda']['forma_pagamento_id'] == 5) {
            $form_request['parcelamento']['venda_id'] = $venda_id; 
            $form_request['parcelamento']['valor_parcelado'] = $form_request['venda']['total']; 
            $form_request['parcelamento']['saldo_devedor'] = $form_request['venda']['total'] - $form_request['parcelamento']['entrada']; 
            Parcelamento::insert($form_request['parcelamento']);
        }
        return $form_request;
    }

    public function pegarVendas (Request $request)
    {
        $vendas = Venda::with(['cliente', 'formaPagamento', 'itens'])->get();
        // foreach ($vendas as $venda) {
        //     if ($venda['forma_envio'] == 0) {
        //         $venda['forma_envio'] = 'Retirada';
        //     } else {
        //         $venda['forma_envio'] = 'Entrega';
        //     }
        // }
        return $vendas;
    }

    public function pegarVenda ($id)
    {
        $venda = Venda::with(['cliente', 'formaPagamento', 'itens' => function ($query) {
            $query->with(['produto', 'tamanho']);
        }, 'parcelamento' => function ($query) {
            $query->with(['pagamentos']);
        }])->find($id);
        // foreach ($compras as $compra) {
            // if ($compra['forma_envio'] == 0) {
            //     $compra['forma_envio'] = 'Retirada';
            // } else {
            //     $compra['forma_envio'] = 'Entrega';
            // }
        // }
        return $venda;
    }

    public function pegarCrediarios (Request $request)
    {
        return Parcelamento::with(['venda' => function ($query) {
            $query->with(['cliente', 'formaPagamento', 'itens' => function ($query) {
                $query->with(['produto', 'tamanho']);
            }]);
        }])->get();
    }

    public function inserirPagamento (Request $request)
    {
        DB::table('pagamentos')->insert([
            'parcelamento_id' => $request['parcelamento_id'],
            'valor' => $request['valor_pagamento'],
            'forma_pagamento_id' => $request['forma_pagamento'],
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $parcelamento = Parcelamento::find($request['parcelamento_id']);
        $parcelamento->saldo_devedor -= floatval($request['valor_pagamento']);
        $parcelamento->save();
        return $request;
    }
}
