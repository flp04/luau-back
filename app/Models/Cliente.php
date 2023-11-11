<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    public function enderecos()
    {
        return $this->hasMany(EnderecoCliente::class, 'cliente_id');
    }

}
