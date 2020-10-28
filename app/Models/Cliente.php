<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $primaryKey = 'codigo_cliente';
    private $table = 'cliente';
    private $fillable = [
        'codigo_cliente',
        'nome',
        'cpf',
        'sexo',
        'email'
    ];
}
