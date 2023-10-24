<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

use App\Models\TicketPagamentoFinanceiro;
use App\Models\Filial;
use App\Models\file_guia;
use App\Models\User;


class PagamentoGuiasView extends Component
{
    use WithFileUploads;

    public $isModalOpen = 0, $filial, $ticket_id;

    public $file_g;
    public $file_guia, $valor_guia;
    public $uploads = [];
    public $uploading = false;

    public $search = '';

    public function render()
    {
        $this->filial_all = Filial::all();
        return view('payments.pagamento-guias-view', ['tickets' => TicketPagamentoFinanceiro::orderByDesc('created_at')->simplePaginate(10),]);
    }

    public function upload()
    {
        $validatedData = $this->validate([
            'file_g' => 'required|max:1024',
        ]);

        foreach ($this->file_g as $file) {
            $path = $file->store('files', 'public');
    
            $url = asset('storage/' . $path);
    
            $newFile = new file_guia([
                'name' => $file->getClientOriginalName(),
                'user_id' =>  Auth::user()->id,
                'ticket_pagamento_financeiro_id' => $this->ticket_id,
                'url' => $path,
            ]);
            $newFile->save();
    
            $this->uploads[] = [
                'id' => $newFile->id,
                'name' => $file->getClientOriginalName(),
                'progress' => 100,
            ];
        }

        $this->uploading = false;
        $this->resetCreateForm();
        $this->emit('refreshComponent');
        $this->dispatchBrowserEvent('Swal:modal', [
            'type' => 'success',
            'title' => 'Atualização',
            'text' => 'O chamado foi aberto com sucesso!',
        ]);
    }
    public function close($id)
    {
        $close = TicketPagamentoFinanceiro::find($id);
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

        $this->viewTicket = TicketPagamentoFinanceiro::find($id);
        $userOper = User::find($this->viewTicket->user_id_closure);

        $this->ticket_id = $id;
        $this->ticket_description = $this->viewTicket->description;
        $this->ticket_status = $this->viewTicket->status;
        $this->ticket_valor_guia = $this->viewTicket->valor_guia;
        $this->ticket_url_guia = $this->viewTicket->url_guia_pagamento;
        $this->ticket_name_guia = $this->viewTicket->file_name_guia_pagamento;
        $this->ticket_created = $this->viewTicket->created_at->format('d/m/y').' as '.$this->viewTicket->created_at->format('H:i:s');
        $this->ticket_updated = $this->viewTicket->updated_at->format('d/m/y').' as '.$this->viewTicket->updated_at->format('H:i:s');
        $this->ticket_filial = Filial::where('id', $this->viewTicket->filial)->pluck('name')->toArray();
        if($userOper == true)
        {
            $this->ticket_setor_operation = $userOper->name;
        }else{
            $this->ticket_setor_operation = '';
        }
        $this->ticket_motived = $this->viewTicket->tips->name;
    }

    private function resetCreateForm()
    {
        $this->file_g = null;
    }

    public function uploadComprovante()
    {
        $validatedData = $this->validate([
            'ticket_id' => 'required',
            'file_guia' => 'required|max:1024',
            'valor_guia' => 'required',
        ]);
        
        // Realize o upload do arquivo
        $filePath = $this->file_guia->store('files', 'public');
        
        // Atualize o modelo (TicketPagamentoFinanceiro)
        $ticket = TicketPagamentoFinanceiro::find($this->ticket_id);
        $ticket->update([
            'url_guia_pagamento' => $filePath,
            'file_name_guia_pagamento' => $this->file_guia->getClientOriginalName(),
            'valor_guia' => $this->valor_guia,
            'status' => 1,
            'user_id_clasure' => Auth::user()->id,
        ]);
        
        // Limpe o campo de upload e valor_guia
        $this->reset(['file_guia', 'valor_guia']);
        $this->dispatchBrowserEvent('closeModalGUI');
        $this->dispatchBrowserEvent('Swal:modal', [
            'type' => 'success',
            'title' => 'GUIA EMITIDA!',
            'text' => 'A Guia foi anexada no ticket, aguarde o pagamento!',
        ]);

    }
}
