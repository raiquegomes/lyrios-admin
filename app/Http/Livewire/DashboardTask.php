<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\User;
use App\Models\Team;
use App\Models\ToDoListTask;
use App\Models\TaskUsers;


class DashboardTask extends Component
{
    public $team;
    public $user_task;
    public $user_info;
    public $isModal = 0;

    public function render()
    {
        $this->team = Team::all();
        return view('dashboard.tasks.dashboard-task');
    }

    public function isModalOpen()
    {
        $this->isModal = true;
        $this->dispatchBrowserEvent('showModalAction');
    }

    public function isModalClose()
    {
        $this->dispatchBrowserEvent('closeModalAction');
    }

    public function view($id)
    {
        $this->isModalOpen();
        $user_task = TaskUsers::where('user_id', $id)->get();
        $this->user_info = User::where('id', $id)->get();


    }
}
