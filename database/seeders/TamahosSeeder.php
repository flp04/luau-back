<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TamahosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tamanhos = [
            ['nome' => 'P'],
            ['nome' => 'M'],
            ['nome' => 'G'],
            ['nome' => 'GG'],
            ['nome' => 'G1'],
            ['nome' => 'G2'],
            ['nome' => 'G3'],
            ['nome' => 'G4'],
            ['nome' => 'G5'],
            ['nome' => '36'],
            ['nome' => '38'],
            ['nome' => '40'],
            ['nome' => '42'],
            ['nome' => '44'],
            ['nome' => '46'],
            ['nome' => '48'],
            ['nome' => '50'],
            ['nome' => '52'],
        ];

        DB::table('tamanhos')->insert($tamanhos);
    }
}
