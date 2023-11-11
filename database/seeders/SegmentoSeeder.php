<?php

namespace Database\Seeders;

use App\Models\Segmento;
use Illuminate\Database\Seeder;

class SegmentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $segmentos = [
            ['nome' => 'Plus Size'],
            ['nome' => 'Surf Wear']
        ];

        Segmento::insert($segmentos);
    }
}
