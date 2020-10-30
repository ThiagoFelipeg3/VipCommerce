<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Cliente extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'codigo_cliente';
    protected $table = 'cliente';
    protected $fillable = [
        'codigo_cliente',
        'nome',
        'cpf',
        'sexo',
        'email'
    ];
}
