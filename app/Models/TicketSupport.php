<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketSupport extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id', 'filial', 'status', 'motived', 'description', 'section', 'name_operator', 'user_id_closure', 'file_name_comprovante_pagamento', 'url_comprovante_pagamento', 'file_name_guia_pagamento', 'url_guia_pagamento',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function filial()
    {
        return $this->belongsTo(Filial::class);
    }

    public function products()
    {
        return $this->hasMany(TicketSupportItems::class);
    }

}
