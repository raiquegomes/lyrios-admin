<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filial extends Model
{
    use HasFactory;

    protected $fillable = [
        'Name',
    ];

    public function ticketsupport()
    {
        return $this->hasMany(TicketSupport::class, 'filial');
    }
}
