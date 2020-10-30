<?php

namespace Tests\Unit;

use App\Models\Cliente;
use App\Models\Pedido;
use App\Notifications\EnviarPedido;
use App\Repository\PedidoRepository;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class PedidoTest extends TestCase
{
    public $pedidos;
    public $pedidoRepository;

    public function setUp(): void
    {
        parent::setUp();
        $this->pedidoRepository = app(PedidoRepository::class);
    }

    public function testSendEmail()
    {
        Notification::fake();
        $pedidos  = Pedido::all();
        $pedido = $pedidos->last();
        $this->pedidoRepository->sendmail($pedido->codigo_pedido);

        Notification::assertSentTo([Cliente::find($pedido->codigo_cliente)], EnviarPedido::class);
    }
}
