<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\User;
use App\Models\Filial;
use App\Models\Products;

class ProductsMatriz extends Component
{
    public $filial_all;

    public function render()
    {
        $this->filial_all = Filial::all();
        return view('products.matriz.products');
    }
}
