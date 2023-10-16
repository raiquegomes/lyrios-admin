<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductLosses extends Model
{
    use HasFactory;

    protected $fillable = [
        'Name', 'total_input_quantity', 'loss_percentage', 'qty_loss',
    ];

}
