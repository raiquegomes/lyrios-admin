<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CutProducts;

class CutIntoProductsViewAE extends Component
{
    protected $listeners = ['refreshComponentCut' => '$refresh'];
    public function render()
    {
        $this->CutIntoAE = CutProducts::where('filial', 2)->orderByRaw("created_at DESC")->get();
        return view('registros.cut-into-products-view-a-e');
    }
}
