<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tips_note_types extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];
}
