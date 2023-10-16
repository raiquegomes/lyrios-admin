<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;

use Livewire\Component;
use Livewire\WithPagination;

use Carbon\Carbon;

use App\Models\TicketSupportItems;
use App\Models\User;
use App\Models\Filial;
use App\Models\Team;



class TicketsSettings extends Component
{

    protected $listeners = ['refreshComponent' => '$refresh'];
    
    use WithPagination;
    
    public $search = '';
    public $price, $name, $product_id, $qty, $date_validated, $filial, $data_abertura, $data_updated, $internal_id, $comprador;

    protected function rules()
    {
        return [
            'price' => 'required',
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function render()
    {
        return view('livewire.tickets-settings', ['products' => TicketSupportItems::where('created_at', '>=', '2023-08-10')->search('id', $this->search)->orderByDesc('created_at')->simplePaginate(10),]);
    }

    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }
    public function closeModalPopover()
    {
        $this->dispatchBrowserEvent('closeModalGUI');
        
    }

    public function editProductTicket($product_id)
    {
        $product = TicketSupportItems::find($product_id);

        if($product){

            $this->product_id = $product->id;
            $this->name = $product->name;
            $this->price = $product->safe_price;
            $this->date_validated = $product->date_validated->format('d/m/y');
            $this->qty = $product->Qty;
            $this->internal_id = $product->internal_id;
            $this->data_abertura = $product->created_at->format('d/m/y H:i:s');
            $this->data_updated = $product->updated_at->format('d/m/y H:i:s');
            $this->comprador = User::where('id', $product->comprador)->pluck('name')->first();

        }else{
            $this->dispatchBrowserEvent('Swal:modal', [
                'type' => 'error',
                'title' => 'ERROR!',
                'text' => 'Não foi encontrado o produto selecionado!',
            ]);
        }


    }

    public function updatePriceSuggest()
    {

        $validatedData = $this->validate();

        TicketSupportItems::where('id', $this->product_id)->update([
            'safe_price' => $validatedData['price'],
            'status' => 1,
            'comprador' => Auth::user()->id,
            'completed_at' => Carbon::now(),
        ]);
        $this->dispatchBrowserEvent('closeModalGUI');
        $this->dispatchBrowserEvent('Swal:modal', [
            'type' => 'success',
            'title' => 'SUCESSO!',
            'text' => 'O preço sugestão do produto foi atualizado com sucesso por '.Auth::user()->name.'!',
        ]);
    }

    public function closeModal()
    {
        $this->resetInputs();
    }

    public function resetInputs()
    {
        $this->name = '';
        $this->price = '';
        $this->qty = '';
        $this->date_validated = '';
        $this->data_abertura = '';
        $this->data_updated = '';
    }
}
