<?php

namespace App\Repository;

use App\Models\Pedido;
use App\Notifications\EnviarPedido;

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
        return $this->getId($codigo_pedido)->load(
            ['produtos', 'formaPagamento']
        )->toArray();
    }

    public function criarPedido(array $dados): array
    {
        $pedidoProduto = data_get($dados, 'pedido_produto');
        $ids = [];

        unset($dados['pedido_produto']);
        $pedido = $this->pedido->create($dados);

        foreach ($pedidoProduto as $pd) {
            $ids[$pd['codigo_produto']] = ['quantidade' => $pd['quantidade']];
        }

        $pedido->produtos()->attach($ids);

        return $pedido->toArray();
    }

    public function editarPedido(array $dados, int $codigo_pedido): ?bool
    {
        $pedido = $this->getId($codigo_pedido);
        if (is_null($pedido)) return null;

        $pedidoProduto = data_get($dados, 'pedido_produto');
        $ids = [];

        foreach ($pedidoProduto as $pd) {
            $ids[$pd['codigo_produto']] = ['quantidade' => $pd['quantidade']];
        }

        $pedido->produtos()->sync($ids);
        unset($dados['pedido_produto']);

        return $pedido->update($dados);
    }

    public function deletarPedido(int $codigo_pedido): bool
    {
        $pedido = $this->getId($codigo_pedido);
        $pedido->produtos()->detach();

        return $pedido->delete();
    }

    public function sendmail(int $codigo_pedido)
    {
        $pedido = $this->getId($codigo_pedido)->load(['produtos']);
        if (is_null($pedido)) return;

        return $pedido->cliente->notify(new EnviarPedido($pedido->toArray(), $pedido->cliente->nome));
    }

    private function getId(int $codigo_pedido): ?Pedido
    {
        return $this->pedido->find($codigo_pedido);
    }
}
