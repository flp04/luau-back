<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\EnderecoCliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function cadastrarCliente (Request $request)
    {
        $form_request = $request->all();
        $cliente_id = Cliente::insertGetId($form_request['cliente']);
        $form_request['endereco']['cliente_id'] = $cliente_id;
        EnderecoCliente::insert($form_request['endereco']);
        return $form_request;
    }

    public function pegarClientes()
    {
        return Cliente::with('enderecos')->get();
    }

    public function pegarCliente($id)
    {
        return Cliente::with('enderecos')->find($id);
    }
}
