<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProductsAdd extends Component
{
    public $ean;
    public $id_product;
    public $nome;

    protected $rules = [
        'ean' => 'required',
        'id_product' => 'required',
        'nome' => 'required',
    ];

    public function render()
    {
        return view('functions.products.products-add');
    }

    public function store()
    {
        $validatedData  = $this->validate();
        
        $createProduct = TicketSupport::create([
            'internal_id' => $this->id_product,
            'EAN' => $this->ean,
            'Nome' => $this->nome,
        ]);

        $this->resetCreateForm();
        $this->emit('refreshComponent');
        $this->dispatchBrowserEvent('Swal:modal', [
            'type' => 'success',
            'title' => 'O produto : '.$createProduct->Nome.' foi criado com sucesso', 
            'text' => 'O produto foi cadastrado com sucesso!',
        ]);

    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
