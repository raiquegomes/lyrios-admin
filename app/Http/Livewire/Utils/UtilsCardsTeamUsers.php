<?php

namespace App\Http\Livewire\Utils;

use Livewire\Component;

use App\Models\User;

class UtilsCardsTeamUsers extends Component
{
    public $teams;
    public function render()
    {
        $this->teams = User::where('current_team_id', 1)->get();
        return view('dashboard.utils.utils-cards-team-users');
    }
}
