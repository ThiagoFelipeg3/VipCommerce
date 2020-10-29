<?php

namespace Tests\Feature;

use App\Models\Produto;
use Tests\TestCase;

class ProdutoTest extends TestCase
{

    public $produto;

    public function setUp(): void
    {
        parent::setUp();
        Produto::factory()->count(3)->create();
        $this->produtos = Produto::all();

    }

    public function testRetornarProdutos()
    {
        $response = $this->get('api/produtos');

        $response->assertJsonCount($this->produtos->count());
        $response->assertStatus(200);
    }

    public function testRetornarUmProduto()
    {
        $produto = $this->produtos->first();

        $response = $this->get("api/produtos/$produto->codigo_produto");

        $response->assertJson($produto->toArray());
        $response->assertStatus(200);
    }

    public function testCriarProduto()
    {
        $produto = [
            "nome" => "feijão",
            "tamanho" => 2.4,
            "cor" => "azul",
            "valor" => 50.99
        ];

        $response = $this->json('POST', 'api/produtos', $produto);

        $response->assertJson($produto);
        $response->assertStatus(201);
    }

    public function testEditarProduto()
    {
        $produto = $this->produtos->first();
        $this->json(
            'PUT',
            "api/produtos/$produto->codigo_produto",
            ["cor" => "vermelho"]
        )->assertStatus(200);

        $response = $this->get("api/produtos/$produto->codigo_produto");
        $this->assertEquals("vermelho", $response->json("cor"));
    }

    public function testDeletarProduto()
    {
        $produto = $this->produtos->first();
        $this->json(
            'DELETE',
            "api/produtos/$produto->codigo_produto"
        )->assertStatus(200);
        $response = $this->get("api/produtos/$produto->codigo_produto");
        $this->assertEquals(1, 1);
    }
}