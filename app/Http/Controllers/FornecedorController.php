<?php

namespace App\Http\Controllers;

use App\Models\EnderecoFornecedor;
use App\Models\Fornecedor;
use App\Models\FornecedorSegmento;
use App\Models\Segmento;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function pegarFornecedores()
    {
        return Fornecedor::with('segmentos')->get();
    }

    public function pegarFornecedor($id)
    {
        return Fornecedor::with('enderecos', 'segmentos')->find($id);
    }

    public function cadastrarFornecedor(Request $request)
    {
        $request_form = $request->all();
        $id = Fornecedor::insertGetId($request_form['fornecedor']);
        $request_form['endereco']['fornecedor_id'] = $id;
        EnderecoFornecedor::insert($request_form['endereco']);
        foreach ($request_form['segmentos'] as $segmento) {
            $registro = Segmento::firstOrCreate(['nome' => $segmento['text']]);
            FornecedorSegmento::insert(['fornecedor_id' =>$id, 'segmento_id' => $registro->id]);
        }
    }
}
