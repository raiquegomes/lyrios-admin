<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsValidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'EAN', 'Nome', 'validated_date', 'Filial',
    ];

    protected $dates = [
        'validated_date'
    ];

}
