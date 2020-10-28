<?php

namespace App\Reporitory;

use App\Models\Cliente;

class ClienteRepository
{
    private $cliente;

    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }

    public function getTodosClientes(array $dados): bool
    {
        return $this->cliente->create($dados);
    }

    public function getCliente(int $codigo_cliente): Cliente
    {
        return $this->cliente->find($codigo_cliente);
    }

    public function criarCliente(array $dados): bool
    {
        return $this->cliente->create($dados);
    }

    public function editarCliente(int $codigo_cliente, array $dados): bool
    {
        return $this->cliente->getCliente($codigo_cliente)->update($dados);
    }

    public function deletarCliente(int $codigo_cliente)
    {
        return $this->getCliente($codigo_cliente)->delete();
    }
}
