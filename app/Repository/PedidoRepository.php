<?php

namespace App\Reporitory;

use App\Models\Pedido;

class PedidoRepository
{
    private $pedido;

    public function __construct(Pedido $pedido)
    {
        $this->pedido = $pedido;
    }

    public function getTodosPedidos(array $dados): bool
    {
        return $this->pedido->create($dados);
    }

    public function getPedido(int $codigo_pedido): Pedido
    {
        return $this->pedido->find($codigo_pedido);
    }

    public function criarPedido(array $dados): bool
    {
        return $this->pedido->create($dados);
    }

    public function editarPedido(int $codigo_pedido, array $dados): bool
    {
        return $this->pedido->getPedido($codigo_pedido)->update($dados);
    }

    public function deletarPedido(int $codigo_pedido)
    {
        return $this->getPedido($codigo_pedido)->delete();
    }
}
