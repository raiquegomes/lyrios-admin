<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketPagamentoFinanceiro extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'status', 'motived', 'description', 'filename',
    ];

}