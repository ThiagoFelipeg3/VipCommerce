<?php

namespace Database\Factories;

use App\Models\Cliente;
use App\Models\FormaPagamento;
use App\Models\Pedido;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Provider\en_US\Text;
class PedidoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pedido::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "data_pedido" => date('Y-m-d'),
            "observacao" => app(Text::class)->realText(20),
            "codigo_forma_pagamento" => FormaPagamento::DINHEIRO,
            "codigo_cliente" => Cliente::all()->last()->codigo_cliente,
        ];
    }
}
