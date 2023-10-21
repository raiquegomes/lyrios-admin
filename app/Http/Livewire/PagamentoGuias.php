<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

use App\Models\TicketPagamentoFinanceiro;
use App\Models\file_guia;
use App\Models\Team;
use App\Models\Filial;


class PagamentoGuias extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $filial, $description, $status_motived;

    public $files = [];
    public $uploads = [];
    public $uploading = false;

    protected $rules = [
        'status_motived' => 'required',
        'description' => 'required',
        'filial' => 'required',
        'files.*' => 'required',
    ];

    public function render()
    {
        $this->team = Team::all();
        $this->filial_all = Filial::all();
        return view('payments.pagamento-guias', ['tickets' => TicketPagamentoFinanceiro::orderByDesc('created_at')->simplePaginate(10),]);
    }

    public function create()
    {
        $validatedData  = $this->validate();

        $this->uploads = [];

        foreach ($this->files as $file) {
            $path = $file->store('uploads');

            $newFile = File::create([
                'name' => $file->getClientOriginalName(),
                'url' => $path, // Armazene a URL do arquivo
            ]);

            $this->uploads[] = [
                'id' => $newFile->id,
                'name' => $file->getClientOriginalName(),
                'progress' => 100,
            ];

        }

        $this->uploading = false;

    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
