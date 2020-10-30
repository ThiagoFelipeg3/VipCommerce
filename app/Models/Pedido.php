<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $primaryKey = 'codigo_pedido';
    protected $table = 'pedido';
    protected $fillable = [
        'codigo_pedido',
        'data_pedido',
        'observacao',
        'codigo_forma_pagamento',
        'codigo_cliente'
    ];

    public function produtos()
    {
        return $this->belongsToMany(Produto::class, 'pedido_produto', 'codigo_pedido', 'codigo_produto')
        ->withPivot([
            "quantidade"
        ]);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'codigo_cliente');
    }
}
