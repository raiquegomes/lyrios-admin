<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;


use Livewire\WithPagination;

use App\Models\TicketSupport;
use App\Models\User;
use App\Models\Filial;
use App\Models\Team;

class ViewCallSupportForm extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh'];
    
    use WithPagination;
    
    public $isModalOpen = 0, $filial;
    public $search = '';

    public function render()
    {
        $this->filial_all = Filial::all();
        return view('tickets.view-call-support-form', ['tickets' => TicketSupport::search('id', $this->search)->search('filial', $this->filial)->orderByDesc('created_at')->simplePaginate(10),]);
    }

    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }
    public function closeModalPopover()
    {
        $this->dispatchBrowserEvent('closeModalGUI');
        
    }

    public function close($id)
    {
        $close = TicketSupport::find($id);
        $close->status = 1;
        $close->user_id_closure = Auth::user()->id;
        $close->save();

        $this->dispatchBrowserEvent('closeModalGUI');
        $this->dispatchBrowserEvent('Swal:modal', [
            'type' => 'success',
            'title' => 'O chamado N°: '.$close->id,
            'text' => 'O chamado foi encerrado com sucesso por '.Auth::user()->name.'!',
        ]);
    }

    public function createAnalisy($id)
    {
        $analisy = TicketSupport::find($id);
        $analisy->status = 2;
        $analisy->user_id_closure = Auth::user()->id;
        $analisy->save();

        $this->dispatchBrowserEvent('closeModalGUI');
        $this->dispatchBrowserEvent('Swal:modal', [
            'type' => 'info',
            'title' => 'O chamado N°: '.$analisy->id,
            'text' => 'Foi designado a ser analisado!',
        ]);
    }

    public function view($id)
    {
        $this->openModalPopover();

        $this->dispatchBrowserEvent('showModalGUI');

        $this->viewTicket = TicketSupport::find($id);
        $userOper = User::find($this->viewTicket->user_id_closure);

        $this->ticket_id = $id;
        $this->ticket_description = $this->viewTicket->description;
        $this->ticket_operator = $this->viewTicket->name_operator;
        $this->ticket_status = $this->viewTicket->status;
        $this->ticket_safe_price = $this->viewTicket->safe_price;
        $this->ticket_created = $this->viewTicket->created_at->format('d/m/y').' as '.$this->viewTicket->created_at->format('H:i:s');
        $this->ticket_updated = $this->viewTicket->updated_at->format('d/m/y').' as '.$this->viewTicket->updated_at->format('H:i:s');
        $this->ticket_filial = Filial::where('id', $this->viewTicket->filial)->pluck('name')->toArray();
        $this->ticket_section = Team::where('id', $this->viewTicket->section)->pluck('name')->toArray();
        if($userOper == true)
        {
            $this->ticket_setor_operation = $userOper->name;
        }else{
            $this->ticket_setor_operation = '';
        }

        //MOTIVO DA ABERTURA
        if($this->viewTicket->motived == 1){
            $this->ticket_motived = "Promoção de Validade";
        }
        if($this->viewTicket->motived == 2){
            $this->ticket_motived = "Remover produto da promoção";
        }
        if($this->viewTicket->motived == 3){
            $this->ticket_motived = "Inconsistência de valor de produto";
        }
        if($this->viewTicket->motived == 4){
            $this->ticket_motived = "Duvida sobre produto";
        }
    }
}
