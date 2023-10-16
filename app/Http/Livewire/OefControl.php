<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\oef_products;

class OefControl extends Component
{
    public function render()
    {
        return view('licitacao.oef.oef-control', ['products_oef' => oef_products::orderByDesc('created_at')->simplePaginate(10),]);
    }
}
