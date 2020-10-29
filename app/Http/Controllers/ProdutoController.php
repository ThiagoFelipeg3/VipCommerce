<?php

namespace App\Http\Controllers;

use App\Repository\ProdutoRepository;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProdutoController extends Controller
{
    public $produtoRepository;

    public function __construct(ProdutoRepository $produtoRepository)
    {
        $this->produtoRepository = $produtoRepository;
    }

    public function getTodosProdutos()
    {
        return response(
            $this->produtoRepository->getTodosProdutos(),
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

    public function criarProduto(Request $dados)
    {
        return response(
            $this->produtoRepository->criarProduto($dados->toArray()),
            Response::HTTP_CREATED
        );
    }

    public function editarProduto(Request $dados, int $codigo_produto)
    {
        return response(
            $this->produtoRepository->editarProduto($dados->toArray(), $codigo_produto),
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
