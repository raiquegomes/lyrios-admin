<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Products;

class ProductsAdd extends Component
{
    public $ean, $id_product, $nome;

    protected $rules = [
        'ean' => 'required|unique:products,EAN',
        'id_product' => 'required',
        'nome' => 'required',
    ];

    protected $messages = [
        'ean.required' => 'Informe o codigo de barra',

        'id_product.required' => 'Digite o N° interno do produto',
        'id_product.unique' => 'O ID interno do produto já foi usado!',

        'nome.required' => 'Informe o nome do produto.',

    ];

    public function render()
    {
        return view('functions.products.products-add');
    }

    public function store()
    {
        $validatedData  = $this->validate();
        
        $createProduct = Products::create([
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


    private function resetCreateForm(){

        $this->ean = '';
        $this->id_product = '';
        $this->nome = '';

    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
