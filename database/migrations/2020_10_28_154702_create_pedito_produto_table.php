<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeditoProdutoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido_produto', function (Blueprint $table) {
            $table->increments('codigo_pedido_produto');
            $table->integer('codigo_pedido')->unsigned();
            $table->integer('codigo_produto')->unsigned();
            $table->integer('quantidade')->default(1);

            $table->foreign('codigo_pedido')->references('codigo_pedido')->on('pedido');
            $table->foreign('codigo_produto')->references('codigo_produto')->on('produto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedido_produto');
    }
}
