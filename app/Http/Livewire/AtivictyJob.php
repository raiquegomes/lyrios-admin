<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class AtivictyJob extends Component
{
    public  $name, $user_id;
    public function render()
    {
        $this->activity = User::all();
        return view('work.ativicty-job');
    }
}
