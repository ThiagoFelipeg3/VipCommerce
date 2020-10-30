<?php

namespace Tests\Feature;

use App\Models\Pedido;
use App\Models\Produto;
use Tests\TestCase;

class PedidoTest extends TestCase
{

    public $pedido;

    public function setUp(): void
    {
        parent::setUp();
        Pedido::factory()
        ->hasAttached(
            Produto::factory()->count(rand(0, 100)),
            ['quantidade' => rand(0, 100)]
        )->create();
        $this->pedidos = Pedido::all();

    }

    public function testRetornarPedidos()
    {
        $response = $this->get('api/pedidos');

        $response->assertJsonCount($this->pedidos->count());
        $response->assertStatus(200);
    }

    public function testRetornarUmPedido()
    {
        $pedido = $this->pedidos->first();

        $response = $this->get("api/pedidos/$pedido->codigo_pedido");

        $response->assertStatus(200);
        $response->assertJson($pedido->toArray());
        $this->assertEquals($pedido->codigo_pedido, $response->json('codigo_pedido'));
    }

    public function testCriarPedido()
    {
        $pedido = Pedido::factory()
        ->make([
            'pedido_produto' => [
                [
                    'codigo_produto' => Produto::all('codigo_produto')->random()->codigo_produto,
                    'quantidade' => rand(0, 100)
                ]
            ]
        ])->toArray();

        $response = $this->json('POST', 'api/pedidos', $pedido);

        $response->assertStatus(201);
        $this->assertEquals($pedido['observacao'], $response->json('observacao'));
    }

    public function testEditarPedido()
    {
        $pedidoSalvo = $this->pedidos->first();
        $pedido = Pedido::factory()
        ->make([
            'codigo_cliente' => $pedidoSalvo->codigo_cliente,
            'pedido_produto' => [
                [
                    'codigo_produto' => Produto::all('codigo_produto')->random()->codigo_produto,
                    'quantidade' => rand(0, 100)
                ]
            ]
        ])->toArray();

        $this->json(
            'PUT',
            "api/pedidos/$pedidoSalvo->codigo_pedido",
            $pedido
        )->assertStatus(200);

        $response = $this->get("api/pedidos/$pedidoSalvo->codigo_pedido");
        $this->assertEquals(count($pedido['pedido_produto']), count($response->json('produtos')));
    }

    public function testDeletarPedido()
    {
        $pedido = $this->pedidos->first();
        $response = $this->json(
            'DELETE',
            "api/pedidos/$pedido->codigo_pedido"
        )->assertStatus(200);
        $this->assertEquals(1, $response->json());
    }
}
