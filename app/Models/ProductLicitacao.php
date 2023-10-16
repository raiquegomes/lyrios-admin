<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductLicitacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_product', 'licitacao_id', 'name', 'quantity', 'price_unit',
    ];
    
    protected $dates = ['date_entrega'];
    
    public function licitacao()
    {
        return $this->belongsTo(Licitacao::class);
    }

    public function issuanceNotes()
    {
        return $this->hasMany(EmissionNote::class);
    }

}
