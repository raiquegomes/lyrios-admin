<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Models\TicketPagamentoFinanceiro;
use App\Models\tips_note_types;
use App\Models\file_guia;
use App\Models\Team;
use App\Models\Filial;


class PagamentoGuias extends Component
{
    use WithFileUploads;

    public $filial, $description, $status_motived;

    public $files = [];
    public $uploads = [];
    public $uploading = false;

    protected $rules = [
        'status_motived' => 'required',
        'description' => 'required',
        'filial' => 'required',
        'files' => 'required',
        'files.*' => 'required',
    ];

    protected $messages = [
        'filial.required' => 'Informe a filial que destina-se o ticket.',
        'status_motived.required' => 'Informe o motivo da abertura do ticket.',
        'description.required' => 'Digite as informações necessárias',

        'files.required' => 'Por favor, forneça os arquivos!',
    ];

    public function render()
    {
        $this->tips = tips_note_types::all();
        $this->filial_all = Filial::all();
        return view('payments.pagamento-guias');
    }

    public function create()
    {
        $validatedData  = $this->validate();

        $this->uploads = [];

        $createTicket = TicketPagamentoFinanceiro::create([
            'user_id' => Auth::user()->id,
            'filial_id' => $this->filial,
            'status' => 0,
            'tips_note_types_id' => $this->status_motived,
            'description' => $this->description,
        ]);

        foreach ($this->files as $file) {
            $path = $file->store('files', 'public');

            $url = asset('storage/' . $path);

            $newFile = new file_guia([
                'name' => $file->getClientOriginalName(),
                'url' => $path, // Armazene a URL do arquivo
            ]);
            $createTicket->guias()->save($newFile);

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
            'title' => 'N° do chamaddo: '.$createTicket->id,
            'text' => 'O chamado foi aberto com sucesso!',
        ]);

    }

    private function resetCreateForm(){

        $this->filial = '';
        $this->description = '';
        $this->status_motived = '';

        $this->files = [];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
