<?php

namespace Tests\Feature;

use App\Models\Cliente;
use Tests\TestCase;

class ClienteTest extends TestCase
{

    public $cliente;

    public function setUp(): void
    {
        parent::setUp();
        Cliente::factory()->count(3)->create();
        $this->clientes = Cliente::all();

    }

    public function testRetornarClientes()
    {
        $response = $this->get('api/clientes');

        $response->assertJsonCount($this->clientes->count());
        $response->assertStatus(200);
    }

    public function testRetornarUmCliente()
    {
        $cliente = $this->clientes->first();

        $response = $this->get("api/clientes/$cliente->codigo_cliente");

        $response->assertJson($cliente->toArray());
        $response->assertStatus(200);
    }

    public function testCriarCliente()
    {
        $cliente = [
            "nome" => "Fernando Souza",
            "cpf" => "6545654512",
            "sexo" => "M",
            "email" => "fernando@gmail.com"
        ];

        $response = $this->json('POST', 'api/clientes', $cliente);

        $response->assertJson($cliente);
        $response->assertStatus(201);
    }

    public function testEditarCliente()
    {
        $cliente = $this->clientes->first();
        $this->json(
            'PUT',
            "api/clientes/$cliente->codigo_cliente",
            ["cpf" => 321546565]
        )->assertStatus(200);

        $response = $this->get("api/clientes/$cliente->codigo_cliente");
        $this->assertEquals("321546565", $response->json("cpf"));
    }

    public function testDeletarCliente()
    {
        $cliente = $this->clientes->first();
        $response = $this->json(
            'DELETE',
            "api/clientes/$cliente->codigo_cliente"
        )->assertStatus(200);
        $this->assertEquals(1, $response->json());
    }
}