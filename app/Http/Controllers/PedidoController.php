<?php

namespace App\Http\Controllers;

use App\Repository\ClienteRepository;
use App\Repository\PedidoRepository;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PedidoController extends Controller
{
    public $pedidoRepository;
    public $clienteRepository;

    public function __construct(
        PedidoRepository $pedidoRepository,
        ClienteRepository $clienteRepository
    ) {
        $this->pedidoRepository = $pedidoRepository;
        $this->clienteRepository = $clienteRepository;
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

    public function sendmail(int $codigo_pedido)
    {
        return response(
            $this->pedidoRepository->sendmail($codigo_pedido),
            Response::HTTP_OK
        );
    }

    public function report(int $codigo_pedido)
    {
        $pedido = $this->pedidoRepository->getPedido($codigo_pedido);
        $cliente = $this->clienteRepository->getCliente($pedido['codigo_cliente']);

        foreach ($pedido['produtos'] as $key => $produto) {
            $pedido['produtos'][$key]['valor_total'] = $produto['valor'] * $produto['pivot']['quantidade'];
        }

        $pedido['valor_total_pedido'] = array_reduce(
            $pedido['produtos'],
            function ($valor, $item) {
                $valor += $item['valor_total'];
                return $valor;
            }
        );

        $pdf = app(PDF::class)->loadView('pdf', [
            'pedido' => $pedido,
            'cliente' => $cliente
        ]);
        return $pdf->download('relatorio.pdf');
    }
}
