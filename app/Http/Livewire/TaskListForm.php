<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Livewire\Component;

use App\Models\ToDoListTask;

class TaskListForm extends Component
{
    public $task_id, $task_title, $task_description, $task_observation;
    public function render()
    {
        return view('livewire.task-list-form', [ 
            'tasks' => ToDoListTask::where('section', Auth::user()->current_team_id)->get()
        ]);
    }
    public function taskCompleted(ToDoListTask $task)
    {
        $task->completed_at = isset($task->completed_at) ? null : Carbon::now();
        $task->save();
    }

    public function taskEdit($id)
    {
        $task = ToDoListTask::find($id);

        $this->task_id = $task->id;
        $this->task_title = $task->title;
        $this->task_description = $task->description;
        $this->task_observation = $task->observation;
    }

    public function taskEditUser()
    {
        $this->validate([
            'task_id' => 'required',
            'task_title' => 'required',
            'task_description' => 'max:255',
        ]);

        $task_idy = ToDoListTask::where('id', $this->task_id)->first();
        $task_idy->id = $this->task_id;
        $task_idy->title = $this->task_title;
        $task_idy->description = $this->task_description;
        $task_idy->observation = $this->task_observation;


        $task_idy->save();
        session()->flash('success', 'As informações da atividade foi arquivadas!');
    }
}
