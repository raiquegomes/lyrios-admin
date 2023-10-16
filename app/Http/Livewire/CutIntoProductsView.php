<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CutProducts;

class CutIntoProductsView extends Component
{
    protected $listeners = ['refreshComponentCut' => '$refresh'];
    public function render()
    {
        $this->CutInto = CutProducts::where('filial', 1)->orderByRaw("created_at DESC")->get();
        return view('registros.cut-into-products-view');
    }
}
