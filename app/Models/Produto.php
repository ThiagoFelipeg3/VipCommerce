<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $primaryKey = 'codigo_produto';
    private $table = 'produto';
    private $fillable = [
        'codigo_produto',
        'nome',
        'cor',
        'tamanho',
        'valor'
    ];
}
