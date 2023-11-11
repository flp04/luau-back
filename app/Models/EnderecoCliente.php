<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnderecoCliente extends Model
{
    use HasFactory;

    protected $table = 'enderecos_clientes';

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }
}
