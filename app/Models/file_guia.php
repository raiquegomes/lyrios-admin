<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class file_guia extends Model
{
    use HasFactory;

    protected $fillable = [
        'guia_id', 'file_name'
    ];
}
