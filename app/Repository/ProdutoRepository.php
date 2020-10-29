<?php

namespace App\Repository;

use App\Models\Produto;

class ProdutoRepository
{
    private $produto;

    public function __construct(Produto $produto)
    {
        $this->produto = $produto;
    }

    public function getTodosProdutos(): array
    {
        return $this->produto->all()->toArray();
    }

    public function getProduto(int $codigo_produto): ?array
    {
        $produto = $this->getId($codigo_produto);
        if (is_null($produto)) return $produto;

        return $produto->toArray();
    }

    public function criarProduto(array $dados): ?array
    {
        return $this->produto->create($dados)->toArray();
    }

    public function editarProduto(array $dados, int $codigo_produto): ?bool
    {
        $produto = $this->getId($codigo_produto);
        if (is_null($produto)) return $produto;

        return $produto->update($dados);
    }

    public function deletarProduto(int $codigo_produto): ?bool
    {
        $produto = $this->getId($codigo_produto);
        if (is_null($produto)) return $produto;

        return $produto->delete();
    }

    private function getId(int $codigo_produto): ?Produto
    {
        return $this->produto->find($codigo_produto);
    }
}
