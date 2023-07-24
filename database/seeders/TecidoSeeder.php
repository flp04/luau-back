<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TecidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tecidos = [
            ['nome' =>  'Algodão'],
            ['nome' =>  'Poliéster'],
            ['nome' =>  'Lã'],
            ['nome' =>  'Seda'],
            ['nome' =>  'Linho'],
            ['nome' =>  'Jeans'],
            ['nome' =>  'Veludo'],
            ['nome' =>  'Renda'],
            ['nome' =>  'Tricô'],
            ['nome' =>  'Malha'],
            ['nome' =>  'Cetim'],
            ['nome' =>  'Sarja'],
            ['nome' =>  'Tule'],
            ['nome' =>  'Viscose'],
            ['nome' =>  'Elastano'],
        ];

        DB::table('tecidos')->insert($tecidos);
    }
}
