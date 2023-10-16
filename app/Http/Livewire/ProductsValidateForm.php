<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Products;
use App\Models\ProductsValidate;

class ProductsValidateForm extends Component
{
    public $ean, $nome, $validated_date, $filial;
    public function render()
    {
        $ean = $this->ean;

        if($ean == true)
        {
            $product = Products::where('EAN', $ean)->first();
            
            if($product == true)
            {
                $this->nome = $product->Nome;
                session()->flash('message', 'O produto: '. $this->nome.', foi encontrado.');

            }else{
                $this->ean = '';
                session()->flash('info', 'O codigo e inválido ou não foi encontrado no banco de dados.');
            }
        }
        return view('products.products-validate-form');
    }

    public function store()
    {
        $this->validate([
            'ean' => 'required',
            'validated_date' => 'required',
            'nome'=> 'required',
            'filial'=> 'required',
        ]);
        
        ProductsValidate::create([
            'EAN' => $this->ean,
            'validated_date' => $this->validated_date,
            'Nome' => $this->nome,
            'Filial' => $this->filial,
        ]);
        session()->flash('message', 'O produto foi inserido com sucesso no registros de produtos com validade proxima.');
        $this->resetCreateForm();
    }
    private function resetCreateForm(){

        $this->ean = '';
        $this->validated_date = '';
        $this->nome = '';
    }
}
