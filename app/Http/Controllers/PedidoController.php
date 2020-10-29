<?php

namespace App\Http\Controllers;

use App\Repository\PedidoRepository;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PedidoController extends Controller
{
    public $pedidoRepository;

    public function __construct(PedidoRepository $pedidoRepository)
    {
        $this->pedidoRepository = $pedidoRepository;
    }

    public function getTodosPedidos()
    {
        return response(
            $this->pedidoRepository->getTodosPedidos(),
            Response::HTTP_OK
        );
    }

    public function getPedido(int $codigo_pedido)
    {
        return response(
            $this->pedidoRepository->getPedido($codigo_pedido),
            Response::HTTP_OK
        );
    }

    public function criarPedido(Request $dados)
    {
        return response(
            $this->pedidoRepository->criarPedido($dados->all()),
            Response::HTTP_CREATED
        );
    }

    public function editarPedido(Request $dados, int $codigo_pedido)
    {
        return response(
            $this->pedidoRepository->editarPedido($dados->all(), $codigo_pedido),
            Response::HTTP_OK
        );
    }

    public function deletarPedido(int $codigo_pedido)
    {
        return response(
            $this->pedidoRepository->deletarPedido($codigo_pedido),
            Response::HTTP_OK
        );
    }
}
