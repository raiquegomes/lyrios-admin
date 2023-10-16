<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Licitacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'processo_number', 'cliente_nome', 'status', 'user_id', 'date_entrega', 'alert',
    ];
    protected $dates = [
        'date_entrega'
    ];

    public function products()
    {
        return $this->hasMany(ProductLicitacao::class);
    }

    public function issuanceNotes()
    {
        return $this->hasManyThrough(EmissionNote::class, ProductLicitacao::class);
    }

}
