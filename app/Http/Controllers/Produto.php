<?php

namespace App\Http\Controllers;

use App\Reporitory\ProdutoRepository;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Produto extends Controller
{
    public $produtoRepository;

    public function __construct(ProdutoRepository $produtoRepository)
    {
        $this->produtoRepository = $produtoRepository;
    }

    public function getTodosProdutos(array $dados)
    {
        return response(
            $this->produtoRepository->getTodosProdutos($dados),
            Response::HTTP_OK
        );
    }

    public function getProduto(int $codigo_produto)
    {
        return response(
            $this->produtoRepository->getProduto($codigo_produto),
            Response::HTTP_OK
        );
    }

    public function criarProduto(array $dados)
    {
        return response(
            $this->produtoRepository->criarProduto($dados),
            Response::HTTP_CREATED
        );
    }

    public function editarProduto(int $codigo_produto, array $dados)
    {
        return response(
            $this->produtoRepository->editarProduto($codigo_produto, $dados),
            Response::HTTP_OK
        );
    }

    public function deletarProduto(int $codigo_produto)
    {
        return response(
            $this->produtoRepository->deletarProduto($codigo_produto),
            Response::HTTP_OK
        );
    }
}
