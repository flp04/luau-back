<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parcelamento extends Model
{
    use HasFactory;

    public function venda() {
        return $this->belongsTo(Venda::class);
    }

    public function pagamentos()
    {
        return $this->hasMany(Pagamento::class, 'parcelamento_id');
    }
}
