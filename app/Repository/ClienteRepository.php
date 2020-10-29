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

    public function getCliente(int $codigo_cliente): array
    {
        return $this->getId($codigo_cliente)->toArray();
    }

    public function criarCliente(array $dados)
    {
        return $this->cliente->create($dados);
    }

    public function editarCliente(array $dados, int $codigo_cliente): bool
    {
        return $this->getId($codigo_cliente)->update($dados);
    }

    public function deletarCliente(int $codigo_cliente): bool
    {
        return $this->getId($codigo_cliente)->delete();
    }

    private function getId(int $codigo_cliente): Cliente
    {
        return $this->cliente->find($codigo_cliente);
    }
}
