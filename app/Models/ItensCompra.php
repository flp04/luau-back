<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItensCompra extends Model
{
    use HasFactory;

    public function compra()
    {
        return $this->belongsTo(Compra::class);
    }

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }

    public function tamanho()
    {
        return $this->belongsTo(Tamanho::class);
    }
}
