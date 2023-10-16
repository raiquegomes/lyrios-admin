<?php

namespace App\Http\Livewire;

use Illuminate\Pagination\Paginator;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Licitacao;
use App\Models\Products;
use App\Models\ProductLicitacao;
use App\Models\EmissionNote;

class LicitacaoControl extends Component
{
    public $viewProcesso, $note_number, $note_licitacao_id, $note_product_id, $name_product,$note_quantity, $processProducts, $issuanceNotes;
    protected $listeners = ['refreshLicitacao' => '$refresh'];

    protected $casts = [
        'date_entrega' => 'date:d-m-Y'
    ];

    protected $rules = [
        'note_number' => 'required',
        'note_licitacao_id' => 'required',
        'note_product_id' => 'required',
        'note_quantity' => 'required',
    ];


    public function render()
    {
        return view('licitacao.licitacao-control', ['licitacao' => Licitacao::orderByDesc('created_at')->simplePaginate(10),]);
    }

    public function showModalAction()
    {
        $this->dispatchBrowserEvent('showModalAction');
    }

    public function closeModalLicitacao()
    {
        $this->reset(['viewProcesso']);
        $this->dispatchBrowserEvent('closeModalLicitacao');
    }

    public function showModalLicitacao()
    {
        $this->dispatchBrowserEvent('showModalLicitacao');
    }

    public function viewLicitacao($id)
    {
        
            $this->viewProcesso = Licitacao::findOrFail($id);
            $this->processProducts  = $this->viewProcesso->products;
            $this->issuanceNotes = $this->viewProcesso->issuanceNotes;
            // Loop through the process products and get the issuance notes for each product
            foreach ($this->processProducts as $processProduct) {
                $issuanceNotes = $processProduct->issuanceNotes;

                // Loop through the issuance notes and calculate the available quantity
                $availableQuantity = $processProduct->quantity;
                foreach ($issuanceNotes as $issuanceNote) {
                    $availableQuantity -= $issuanceNote->quantity;
                }

                // Add the available quantity to the process product
                $processProduct->available_quantity = $availableQuantity;
            }



            $this->note_licitacao_id = $this->viewProcesso->id;
            $this->licitacao_id_processo = $this->viewProcesso->processo_number;
            $this->licitacao_destino = $this->viewProcesso->cliente_nome;
            $this->licitacao_date_entrega = $this->viewProcesso->date_entrega;
            $this->showModalLicitacao();
    }

    public function createNote()
    {
        $validatedData  = $this->validate();

        $createNote = EmissionNote::create([
            'number' => $this->note_number,
            'product_licitacao_id' => $this->note_product_id,
            'quantity' => $this->note_quantity,
        ]);
        $this->dispatchBrowserEvent('Swal:modal', [
            'type' => 'success',
            'title' => 'Sucesso ao criar o processo!',
            'text' => 'O seu processo foi criado com sucesso!',
        ]);
    }

    public function removeNote($id)
    {
        $this->security_del = EmissionNote::find($id)->delete();

        $this->dispatchBrowserEvent('Swal:modal', [
            'type' => 'success',
            'title' => 'Deletado com sucesso!',
            'text' => 'O seu processo foi deletado com sucesso!',
        ]);
    }


    private function resetCreateForm(){

        $this->note_product_id = '';
        $this->note_quantity = '';
    }
}
