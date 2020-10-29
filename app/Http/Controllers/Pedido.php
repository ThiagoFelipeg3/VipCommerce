<?php

namespace App\Http\Controllers;

use App\Reporitory\PedidoRepository;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Pedido extends Controller
{
    public $pedidoRepository;

    public function __construct(PedidoRepository $pedidoRepository)
    {
        $this->pedidoRepository = $pedidoRepository;
    }

    public function getTodosPedidos(array $dados)
    {
        return response(
            $this->pedidoRepository->getTodosPedidos($dados),
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

    public function criarPedido(array $dados)
    {
        return response(
            $this->pedidoRepository->criarPedido($dados),
            Response::HTTP_CREATED
        );
    }

    public function editarPedido(int $codigo_pedido, array $dados)
    {
        return response(
            $this->pedidoRepository->editarPedido($codigo_pedido, $dados),
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
