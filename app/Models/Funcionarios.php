<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionarios extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'data_nascimento', 'departamento_id', 'cidade', 'endereco', 'numero_casa', 'cpf', 'identidade', 'genero', 'email', 'contato', 'pai', 'mae', 'observacao'
    ];
}
