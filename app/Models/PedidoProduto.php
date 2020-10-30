<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoProduto extends Model
{
    use HasFactory;

    protected $table = 'pedido_produto';
    protected $fillable = [
        'codigo_pedido_produto',
        'codigo_pedido',
        'codigo_produto',
        'quantidade'
    ];
}
