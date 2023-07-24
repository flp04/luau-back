<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormaPagamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $formasPagamento = [
            ['nome' => 'PIX'],
            ['nome' => 'Dinheiro'],
            ['nome' => 'Débito'],
            ['nome' => 'Crédito'],
            ['nome' => 'Crediario'],
        ];
        
        DB::table('formas_pagamento')->insert($formasPagamento);
    }
}
