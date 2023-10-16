<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;

use Livewire\WithPagination;
use Livewire\Component;

use App\Models\NFs;
use App\Models\Filial;
use App\Models\User;

class NFeFormView extends Component
{
    use WithPagination;

    protected $listeners = ['refreshComponentnfeview' => '$refresh'];
    public $isModalOpen = 0, $filial;

    public function render()
    {
        $this->filial_all = Filial::all();
        return view('NFe.n-fe-form-view', ['nfe' => NFs::search('filial', $this->filial)->orderByDesc('created_at')->simplePaginate(10),]);
    }

    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }
    public function closeModalPopover()
    {
        $this->dispatchBrowserEvent('closeModalGUI');
        
    }

    public function view($id)
    {
        $this->openModalPopover();

        $this->dispatchBrowserEvent('showModalGUI');

        $this->viewslip = NFs::find($id);

        $operator_1 = User::find($this->viewslip->cpd_user_id_closure);
        $operator_2 = User::find($this->viewslip->financeiro_user_id_closure);

        if($operator_1 == true)
        {
            $this->cpd_user = $operator_1->name;
        }else{
            $this->cpd_user = '';
        }

        if($operator_2 == true)
        {
            $this->financeiro_user = $operator2->name;
        }else{
            $this->financeiro_user = '';
        }


        $this->operator_1 = User::find($this->viewslip->cpd_user_id_closure);
        $this->operator_2 = User::find($this->viewslip->financeiro_user_id_closure);

        $this->nfe_status = $this->viewslip->entry;
        $this->nfe_id = $this->viewslip->id;
        $this->slip_id = $id;
        $this->slip_nfe = $this->viewslip->access_key;
        $this->slip_created = $this->viewslip->created_at->format('d/m/y').' as '.$this->viewslip->created_at->format('H:i:s');
        $this->slip_updated = $this->viewslip->updated_at->format('d/m/y').' as '.$this->viewslip->updated_at->format('H:i:s');
        $this->slip_filial = Filial::where('id', $this->viewslip->filial)->pluck('name')->toArray();

    }

    public function confirmAction($id)
    {
        $analisy = NFs::find($id);

        if($analisy->entry == 0)
        {
            $analisy->entry = 1;
            $analisy->cpd_user_id_closure = Auth::user()->id;
            $analisy->save();

            $this->emit('refreshComponent');
            $this->dispatchBrowserEvent('closeModalGUI');
            $this->dispatchBrowserEvent('Swal:modal', [
                'type' => 'success',
                'title' => 'A informações do ID: '.$analisy->id,
                'text' => 'O status foi atualizado com sucesso!',
            ]);

        }else{
            $analisy->entry = 2;
            $analisy->financeiro_user_id_closure = Auth::user()->id;
            $analisy->save();

            $this->emit('refreshComponent');
            $this->dispatchBrowserEvent('closeModalGUI');
            $this->dispatchBrowserEvent('Swal:modal', [
                'type' => 'success',
                'title' => 'A informações do ID: '.$analisy->id,
                'text' => 'O status foi atualizado com sucesso!',
            ]);
        }
    }
}
