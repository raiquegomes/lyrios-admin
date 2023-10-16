<?php

namespace App\Http\Livewire\Utils;

use Livewire\Component;

use App\Models\ProductsValidate;
use App\Models\TicketSupportItems;

class UtilsCardsProductsLosing extends Component
{
    protected $listeners = ['refreshComponentValidate' => '$refresh'];
    public $ifExistValue = 0;
    public $searchProducts = 0;

    public function render()
    {
        if(TicketSupportItems::where('date_validated', date('Y-m-d'))->exists())
        {
            $this->searchProducts = TicketSupportItems::where('date_validated', date('Y-m-d'))->get();
            $this->ifExistValue == true;
        }
        return view('dashboard.utils.utils-cards-products-losing');
    }
}
