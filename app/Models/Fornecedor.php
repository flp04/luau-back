<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    use HasFactory;

    protected $table = 'fornecedores';

    public function segmentos()
    {
        return $this->belongsToMany(Segmento::class, 'fornecedores_segmentos', 'fornecedor_id', 'segmento_id');
    }

    public function enderecos()
    {
        return $this->hasMany(EnderecoFornecedor::class, 'fornecedor_id');
    }
}
