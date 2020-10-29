<?php

namespace App\Http\Controllers;

use App\Reporitory\ClienteRepository;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Cliente extends Controller
{
    public $clienteRepository;

    public function __construct(ClienteRepository $clienteRepository)
    {
        $this->clienteRepository = $clienteRepository;
    }

    public function getTodosClientes(array $dados)
    {
        return response(
            $this->clienteRepository->getTodosClientes($dados),
            Response::HTTP_OK
        );
    }

    public function getCliente(int $codigo_cliente)
    {
        return response(
            $this->clienteRepository->getCliente($codigo_cliente),
            Response::HTTP_OK
        );
    }

    public function criarCliente(array $dados)
    {
        return response(
            $this->clienteRepository->criarCliente($dados),
            Response::HTTP_CREATED
        );
    }

    public function editarCliente(int $codigo_cliente, array $dados)
    {
        return response(
            $this->clienteRepository->editarCliente($codigo_cliente, $dados),
            Response::HTTP_OK
        );
    }

    public function deletarCliente(int $codigo_cliente)
    {
        return response(
            $this->clienteRepository->deletarCliente($codigo_cliente),
            Response::HTTP_OK
        );
    }
}
