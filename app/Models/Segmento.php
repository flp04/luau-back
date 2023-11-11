<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Segmento extends Model
{
    use HasFactory;

    protected $fillable = ['nome'];

    public $timestamps = false;

    public function fornecedor()
    {
        return $this->belongsToMany(Fornecedor::class, 'fornecedores_segmentos', 'fornecedor_id', 'segmento_id');
    }

}
