<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToDoListTask extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'title',
        'section',
        'description',
        'observation',
        'start_task_date',
        'end_task-date',
    ];

    protected $dates = [
        'completed_at'
    ];

    public function user_task()
    {
        return $this->hasMany(TaskUsers::class, 'task_id');
    }

}
