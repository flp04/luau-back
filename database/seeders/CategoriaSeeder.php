<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorias = [
            ['nome' => 'Camiseta'],
            ['nome' => 'Camisa'],
            ['nome' => 'Blusa'],
            ['nome' => 'Suéter'],
            ['nome' => 'Casaco'],
            ['nome' => 'Jaqueta'],
            ['nome' => 'Vestido'],
            ['nome' => 'Saia'],
            ['nome' => 'Calça'],
            ['nome' => 'Short'],
            ['nome' => 'Bermuda'],
            ['nome' => 'Macacão'],
            ['nome' => 'Macaquinho'],
        ];

        DB::table('categorias')->insert($categorias);
    }
}
