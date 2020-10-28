<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido', function (Blueprint $table) {
            $table->increments('codigo_pedido');
            $table->date('data_pedido')->nullable(false);
            $table->text('observacao');

            $table->integer('codigo_forma_pagamento')->nullable(false)->unsigned();
            $table->foreign('codigo_forma_pagamento')->references('codigo_forma_pagamento')->on('forma_pagamento');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedido');
    }
}
