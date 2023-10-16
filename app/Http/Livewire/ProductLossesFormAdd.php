<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Products;
use App\Models\ProductLosses;

class ProductLossesFormAdd extends Component
{
    public $ean;
    public $searchProduct;
    public $qty;
    public $product_id;
    public $qty_formated;
    public $filial;
    public $losses_null;

    public function store()
    {
        $this->validate([
            'ean' => 'required',
            'qty' => 'required|max:5',
            'filial' => 'required',
        ]);

        if(ProductLosses::where('EAN', $this->ean)->get() == false)
        {
            ProductLosses::create([
                'EAN' => $this->ean,
                'Qty' => $this->qty,
                'Filial' => $this->filial,
            ]);

            session()->flash('message', 'O produto foi inserido com sucesso!');
            $this->emit('refreshComponentCut');
            $this->resetCreateForm();

        }else{
            ProductLosses::where('EAN', $losses_null->EAN)->update(['qty' => $losses_null->qty + $this->qty]);

            session()->flash('message', 'O produto foi atualizado com sucesso!');
            $this->emit('refreshComponentCut');
            $this->resetCreateForm();
        }

    }


    private function resetCreateForm(){

        $this->ean = '';
        $this->searchProduct = '';
        $this->qty = '';
    }

    public function render()
    {

        $searchProduct = $this->searchProduct;

        if($searchProduct == true)
        {
            $product = Products::find($searchProduct);
            if($product == true)
            {
                $this->ean = $product->EAN;
                $this->nome = $product->Nome;

                session()->flash('message', 'O produto: '. $this->nome.', foi encontrado.');

            }else{
                $this->ean = '';
                session()->flash('info', 'O codigo e inválido ou não foi encontrado no banco de dados.');
                
            }
        }
        return view('services.products.product-losses-form-add');
    }
}
