<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Team;
use App\Models\ToDoListTask;
use App\Models\Filial;

class ToDoListTaskAdd extends Component
{
    public $title, $section, $description, $start_task_date, $end_task_date;
    public function render()
    {
        $this->team = Team::all();
        $this->filial_all = Filial::all();

        return view('section.to-do-list-task-add');
    }
    public function store()
    {
        $this->validate([
            'title' => 'required',
            'section' => 'required',
            'start_task_date' => 'required',
            'end_task_date' => 'required',
        ]);

        ToDoListTask::create([
            'title' => $this->title,
            'section' => $this->section,
            'description' => $this->description,
            'start_task_date' => $this->start_task_date,
            'end_task_date' => $this->end_task_date,
        ]);

        session()->flash('message', 'A atividade foi adicionado com sucesso.');
        $this->emit('refreshComponenttask');
    }
}
