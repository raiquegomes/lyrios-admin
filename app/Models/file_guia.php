<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class file_guia extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_pagamento_financeiro_id', 'name', 'url'
    ];

    public function ticket()
    {
        return $this->belongsTo(TicketPagamentoFinanceiro::class);
    }
}
