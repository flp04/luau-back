<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function formaPagamento()
    {
        return $this->belongsTo(FormaPagamento::class, 'forma_pagamento_id');
    }

    public function parcelamento()
    {
        return $this->hasOne(Parcelamento::class, 'venda_id');
    }

    public function itens()
    {
        return $this->hasMany(ItensVenda::class, 'venda_id');
    }
}
