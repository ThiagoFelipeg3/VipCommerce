<?php

namespace App\Repository;

use App\Models\Pedido;

class PedidoRepository
{
    private $pedido;

    public function __construct(Pedido $pedido)
    {
        $this->pedido = $pedido;
    }

    public function getTodosPedidos(): array
    {
        return $this->pedido->all()->toArray();
    }

    public function getPedido(int $codigo_pedido): array
    {
        return $this->getId($codigo_pedido)->toArray();
    }

    public function criarPedido(array $dados)
    {
        return $this->pedido->create($dados)->toArray();
    }

    public function editarPedido(int $codigo_pedido, array $dados): bool
    {
        return $this->getId($codigo_pedido)->update($dados);
    }

    public function deletarPedido(int $codigo_pedido): bool
    {
        return $this->getId($codigo_pedido)->delete();
    }

    private function getId(int $codigo_pedido): Pedido
    {
        return $this->pedido->find($codigo_pedido);
    }
}
