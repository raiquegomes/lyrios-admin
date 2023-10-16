<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\ProductsValidate;
use App\Models\TicketSupportItems;


class ProductsValidateFormView extends Component
{
    protected $listeners = ['refreshComponentValidate' => '$refresh'];
    public $ifExistValue = 0;
    public $searchProducts = 0;
    public function render()
    {
        if(ProductsValidate::where('validated_date', date('Y-m-d'))->exists())
        {
            $this->searchProducts = ProductsValidate::where('validated_date', date('Y-m-d'))->get();
            $this->ifExistValue == true;
        }
        return view('livewire.products-validate-form-view');
    }
}
