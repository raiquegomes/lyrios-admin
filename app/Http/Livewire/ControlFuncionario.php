<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Funcionarios;

class ControlFuncionario extends Component
{
    public function render()
    {
        $this->Funcionarios = Funcionarios::all();
        return view('rh.utils.control-funcionario', ['funcionarios' => $this->Funcionarios]);
    }
}
