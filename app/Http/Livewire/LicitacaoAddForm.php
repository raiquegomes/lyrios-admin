<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

use App\Models\Licitacao;
use App\Models\ProductLicitacao;
use App\Models\Products;

class LicitacaoAddForm extends Component
{
    public $id_processo;
    public $destino;
    public $date_entrega;
    public $shippMercadoria = false;
    public $products = [];

    protected $rules = [
        'id_processo' => 'required|min:2',
        'destino' => 'required|min:5',
        'date_entrega' => 'exclude_if:shippMercadoria,false|required|date',

        'products' => 'required|',
        'products.*.id_product' => 'required|numeric|exists:products,id',
        'products.*.name' => 'required',
        'products.*.Qty' => 'required|integer|min:1',
        'products.*.price' => 'required',

    ];

    protected $messages = [
        'id_processo.required' => 'E de extrema importância o N° do processo da licitação',
        'id_processo.min' => 'O N° do processo deve ter no minimo 2 digitos.',

        'destino.required' => 'E de extrema importância o nome do lugar que destina-se o processo!',
        'destino.min' => 'O destino deve conter no minimo 5 letras.',

        'date_entrega.required' => 'O processo tem data de entrega, você deve inserir a data corretamente',
        'date_entrega.date' => 'Insira uma data válida!',

        'products.required' => 'Por favor, insira as informações necessárias dos produtos!',

        'products.*.id_product.required' => 'Informe o ID do produto',
        'products.*.id_product.numeric' => 'O id interno só aceita caracteres numericos.',
        'products.*.id_product.exists' => 'Esse produto não existe em nosso banco de dados.',

        'products.*.name.required' => 'O produto não está validado ou não foi atualizado o nome.',

        'products.*.Qty.required' => 'Informe a quantidade correta ou aproximada de produtos desta data de validade.',

        'products.*.price.required' => 'Informe o preço unitário do produto',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submitForm()
    {
        $validatedData = $this->validate();

        $createTicket = Licitacao::create([
            'processo_number' => $this->id_processo,
            'cliente_nome' => $this->destino,
            'date_entrega' => $this->date_entrega,
            'user_id' => Auth::user()->id,
            'status' => 1,
        ]);

        foreach ($validatedData['products'] as $productData) {
            $product = new ProductLicitacao([
                'id_product' => $productData['id_product'],
                'name' => $productData['name'],
                'quantity' => $productData['Qty'],
                'price_unit' => $productData['price'],
            ]);
            $createTicket->products()->save($product);
        }

        $this->emit('refreshLicitacao');
        $this->dispatchBrowserEvent('closeModalAction');
        $this->dispatchBrowserEvent('Swal:modal', [
            'type' => 'success',
            'title' => 'Sucesso ao criar o processo!',
            'text' => 'O seu processo foi criado com sucesso!',
        ]);

        $this->reset(['id_processo', 'destino', 'date_entrega', 'products']);
    }

    public function render()
    {
        return view('licitacao.licitacao-add-form');
    }

    public function addProduct()
    {
        $this->products[] = [
            'id_product' => '',
            'name' => '',
            'Qty' => '',
            'price' => '',
        ];
    }

    public function refreshInformacoes()
    {
        foreach ($this->products as $index => $product) {
            $dbEan = Products::where('id', $product['id_product'])->first();

            if ($dbEan) {
                $this->products[$index]['name'] = $dbEan->Nome;
            } else {
                $this->products[$index]['name'] = '';
            }
        }
    }

    public function removeProduct($index)
    {
        unset($this->products[$index]);
        $this->products = array_values($this->products);
    }

    public function closeModalAction()
    {
        $this->dispatchBrowserEvent('closeModalAction');
    }
}
