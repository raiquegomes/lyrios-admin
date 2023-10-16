<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmissionNote extends Model
{
    use HasFactory;

    protected $fillable = [
        'number', 'product_licitacao_id', 'quantity'
    ];


    public function product()
    {
        return $this->belongsTo(ProductLicitacao::class, 'product_licitacao_id');
    }
}
