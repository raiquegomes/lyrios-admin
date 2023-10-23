<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketPagamentoFinanceiro extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'status', 'tips_note_types_id', 'description', 'filial_id', 'user_id_closure',
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
