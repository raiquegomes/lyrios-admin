<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;

use App\Models\TicketSupport;
use App\Models\TicketSupportItems;

use App\Http\Livewire\Field;

use App\Models\Team;
use App\Models\Filial;
use App\Models\Products;

use Livewire\Component;

class OpenCallSuportForm extends Component
{
    public $tickets, $tickets_id, $filial, $responsavel, $description, $status_motived, $section, $user_id, $internal_id;
    public $products = [];

    protected $rules = [
        'filial' => 'required',
        'status_motived' => 'required',
        'responsavel' => 'required',
        'section' => 'required',
        'description' => 'exclude_if:status_motived, 1|required',

        'products' => 'exclude_if:status_motived, 3,4|required|',
        'products.*.ean' => 'required|numeric|exists:products,EAN',
        'products.*.name' => 'required',
        'products.*.Qty' => 'required|integer|min:1',
        'products.*.date_validated' => 'required|date',
        'products.*.safe_price' => 'max:5',
        'products.*.internal_id' => 'required',
    ];

    protected $messages = [
        'filial.required' => 'Informe a filial que destina-se o ticket.',
        'status_motived.required' => 'Informe o motivo da abertura do ticket.',
        'responsavel.required' => 'Informe o responsavel pelo departamento desse produto.',
        'section.required' => 'E de extrema importância o nome do lugar que destina-se o processo!',
        'description.required' => 'Digite as informações necessárias',


        'products.required' => 'Por favor, insira as informações necessárias dos produtos!',

        'products.*.ean.required' => 'Informe o codigo de barra do produto',
        'products.*.ean.numeric' => 'O codigo de barra só aceita caracteres numericos.',
        'products.*.ean.exists' => 'Esse codigo de barra não existe em nosso banco de dados.',

        'products.*.name.required' => 'O produto não está validado ou não foi atualizado o nome.',

        'products.*.Qty.required' => 'Informe a quantidade correta ou aproximada de produtos desta data de validade.',
        'products.*.Qty.min' => 'A quantidade minima para realizar o chamado deste produto e de 1 para cima.',

        'products.*.date_validated.required' => 'Informe a data de validade do produto',

        'products.*.internal_id.required' => 'Informe o codigo interno do produto.',

        'products.*.safe_price.max' => 'A quantidade suportada da coluna de Preço Sugerido não pode ultrapassar 5 caracteres.'
    ];

    public function render()
    {

        $this->team = Team::all();
        $this->filial_all = Filial::all();
        return view('tickets.open-call-suport-form');
    }

    public function store()
    {
        $validatedData  = $this->validate();

        $createTicket = TicketSupport::create([
            'user_id' => Auth::user()->id,
            'filial' => $this->filial,
            'status' => 0,
            'motived' => $this->status_motived,
            'description' => $this->description,
            'section' => $this->section,
            'name_operator' => $this->responsavel,
        ]);

        if($this->products){
            foreach ($validatedData['products'] as $productData) {
                $product = new TicketSupportItems([
                    'EAN' => $productData['ean'],
                    'date_validated' => $productData['date_validated'],
                    'name' => $productData['name'],
                    'Qty' => $productData['Qty'],
                    'safe_price' => $productData['safe_price'],
                    'internal_id' => $productData['internal_id'],
                    'filial' => $this->filial,
                    'status' => 0
                ]);
                $createTicket->products()->save($product);
            } 
        }

        $this->resetCreateForm();
        $this->emit('refreshComponent');
        $this->dispatchBrowserEvent('Swal:modal', [
            'type' => 'success',
            'title' => 'N° do chamaddo: '.$createTicket->id,
            'text' => 'O chamado foi aberto com sucesso!',
        ]);

    }

    private function resetCreateForm(){

        $this->filial = '';
        $this->description = '';
        $this->status_motived = '';
        $this->responsavel = '';
        $this->section = '';

        $this->products = [];
    }
    public function refreshInformacoes()
    {
        foreach ($this->products as $index => $product) {
            $dbEan = Products::where('EAN', $product['ean'])->first();

            if ($dbEan) {
                $this->products[$index]['name'] = $dbEan->Nome;
                $this->products[$index]['internal_id'] = $dbEan->internal_id;
            } else {
                $this->products[$index]['name'] = '';
            }
        }
    }

    public function addProduct()
    {
        $this->products[] = [
            'ean' => '',
            'name' => '',
            'Qty' => '',
            'date_validated' => '',
            'safe_price' => '',
        ];
    }

    public function removeProduct($index)
    {
        unset($this->products[$index]);
        $this->products = array_values($this->products);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
