<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsCutsFornecedores extends Model
{
    use HasFactory;

    protected $fillable = [
        'Nome', 'user_id', 
    ];
}
