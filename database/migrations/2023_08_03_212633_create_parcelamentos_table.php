<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParcelamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parcelamentos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('venda_id')->constrained('vendas');
            $table->decimal('valor_parcelado', 10, 2);
            $table->decimal('entrada', 10, 2)->nullable();
            $table->integer('n_parcelas');
            $table->integer('dia_vencimento');
            $table->date('data_primeira_parcela');
            $table->decimal('valor_parcela', 10, 2);
            $table->decimal('saldo_devedor', 10, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parcelamentos');
    }
}
