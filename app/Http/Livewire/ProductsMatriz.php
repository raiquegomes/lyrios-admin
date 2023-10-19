<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Filial;

class ProductsMatriz extends Component
{
    public function render()
    {
        $this->filial_all = Filial::all();
        return view('products.matriz.products');
    }
}
