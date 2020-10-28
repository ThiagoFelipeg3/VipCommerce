<?php

namespace App\Reporitory;

use App\Models\Produto;

class ProdutoRepository
{
    private $produto;

    public function __construct(Produto $produto)
    {
        $this->produto = $produto;
    }

    public function getTodosProdutos(array $dados): bool
    {
        return $this->produto->create($dados);
    }

    public function getProduto(int $codigo_produto): Produto
    {
        return $this->produto->find($codigo_produto);
    }

    public function criarProduto(array $dados): bool
    {
        return $this->produto->create($dados);
    }

    public function editarProduto(int $codigo_produto, array $dados): bool
    {
        return $this->produto->getProduto($codigo_produto)->update($dados);
    }

    public function deletarProduto(int $codigo_produto)
    {
        return $this->getProduto($codigo_produto)->delete();
    }
}
