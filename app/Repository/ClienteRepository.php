<?php

namespace App\Repository;

use App\Models\Cliente;

class ClienteRepository
{
    private $cliente;

    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }

    public function getTodosClientes(): array
    {
        return $this->cliente->all()->toArray();
    }

    public function getCliente(int $codigo_cliente): ?array
    {
        $cliente = $this->getId($codigo_cliente);
        if (is_null($cliente)) return $cliente;

        return $cliente->toArray();
    }

    public function criarCliente(array $dados): array
    {
        return $this->cliente->create($dados)->toArray();
    }

    public function editarCliente(array $dados, int $codigo_cliente): ?bool
    {
        $cliente = $this->getId($codigo_cliente);
        if (is_null($cliente)) return $cliente;

        return $cliente->update($dados);
    }

    public function deletarCliente(int $codigo_cliente): ?bool
    {
        $cliente = $this->getId($codigo_cliente);
        if (is_null($cliente)) return $cliente;

        return $cliente->delete();
    }

    private function getId(int $codigo_cliente): ?Cliente
    {
        return $this->cliente->find($codigo_cliente);
    }
}
