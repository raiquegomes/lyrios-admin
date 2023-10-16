<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NFs extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'access_key',
        'filial',
        'entry',
        'cpd_user_id_closure',
        'financeiro_user_id_closure',
    ];


    public function slips()
    {
        return $this->hasMany(NFs_slips::class);
    }
}
