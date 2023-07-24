<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DefinicoesInputController extends Controller
{
    public function getDefinicoesInput()
    {
        return [
            'tamanhos' => DB::table('tamanhos')->get(),
            'categorias' => DB::table('categorias')->get(),
            'tecidos' => DB::table('tecidos')->get(),
            'formas_pagamento' => DB::table('formas_pagamento')->get(),
        ];
    }
}
