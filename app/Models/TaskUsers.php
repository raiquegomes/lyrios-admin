<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskUsers extends Model
{
    use HasFactory;

    protected $fillable = [ 'user_id', 'status', 'task_id', 'completed_at', 'observation', 'filial' ];
}
