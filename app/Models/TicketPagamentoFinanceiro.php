<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketPagamentoFinanceiro extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'status', 'tips_note_types_id', 'description', 'filial_id', 'user_id_closure', 'number_nota', 'file_name_comprovante_pagamento', 'url_comprovante_pagamento', 'file_name_guia_pagamento', 'url_guia_pagamento', 'valor_guia',
    ];

    public function guias()
    {
        return $this->hasMany(file_guia::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tips()
    {
        return $this->belongsTo(tips_note_types::class, 'tips_note_types_id');
    }

    public function filial()
    {
        return $this->belongsTo(Filial::class);
    }

}
