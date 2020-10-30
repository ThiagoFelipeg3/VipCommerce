<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormaPagamento extends Model
{
    const DINHEIRO = 1;
    const CARTAO = 2;
    const CHEQUE = 3;

    protected $table = 'forma_pagamento';
    protected $primaryKey = 'codigo_forma_pagamento';
    protected $fillable = [
        'codigo_forma_pagamento',
        'descricao'
    ];
}