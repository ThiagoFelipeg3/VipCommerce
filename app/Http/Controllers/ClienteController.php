<?php

namespace App\Http\Controllers;

use App\Repository\ClienteRepository;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClienteController extends Controller
{
    public $clienteRepository;

    public function __construct(ClienteRepository $clienteRepository)
    {
        $this->clienteRepository = $clienteRepository;
    }

    public function getTodosClientes()
    {
        return response(
            $this->clienteRepository->getTodosClientes(),
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

    public function criarCliente(Request $dados)
    {
        return response(
            $this->clienteRepository->criarCliente($dados->all()),
            Response::HTTP_CREATED
        );
    }

    public function editarCliente(Request $dados, int $codigo_cliente)
    {
        return response(
            $this->clienteRepository->editarCliente($dados->all(), $codigo_cliente),
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
