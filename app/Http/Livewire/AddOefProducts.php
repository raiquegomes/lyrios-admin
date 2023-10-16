<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Products;
use App\Models\oef_products;

class AddOefProducts extends Component
{
    public $ean;
    public $searchProduct;
    public $qty;
    public $nome;
    public $product_id;
    public $qty_formated;
    public $filial;

    protected $listeners = ['notFound' => 'productNotFound', 'existCeasa' => 'CeasaPortaCut'];

    public function productNotFound()
    {
        $this->dispatchBrowserEvent('Swal:modal', [
            'type' => 'error',
            'title' => 'Pow! Maluco, você é burro?!',
            'imageUrl' => 'https://i.ytimg.com/vi/-MK1q9fZjeI/mqdefault.jpg',
            'imageWidth'=> 400,
            'imageHeight'=> 200,
            'text' => 'Esse produto não está qualificado para colocar nos cortes!',
        ]);
    }

    public function store()
    {
        $this->validate([
            'searchProduct' => 'required',
            'nome' => 'required',
            'qty' => 'required|max:5',
        ]);

        if(oef_products::where('product_id', $this->searchProduct)->first())
        {

            oef_products::create([
                'product_id' => $this->searchProduct,
                'name' => $this->nome,
                'quantity' => $this->qty,
            ]);

            $this->dispatchBrowserEvent('Swal:modal', [
                'type' => 'success',
                'title' => 'Sucesso!',
                'text' => 'O produto foi adicionado com sucesso aos registros de cortes!',
            ]);
            $this->emit('refreshComponentCut');
            $this->resetCreateForm();

        }else{
            oef_products::create([
                'product_id' => $this->searchProduct,
                'name' => $this->nome,
                'quantity' => $this->qty,
            ]);

            $this->dispatchBrowserEvent('Swal:modal', [
                'type' => 'success',
                'title' => 'Sucesso!',
                'text' => 'O produto foi adicionado com sucesso aos registros de cortes!',
            ]);
            $this->emit('refreshComponentCut');
            $this->resetCreateForm();
        }
    }


    private function resetCreateForm(){

        $this->ean = '';
        $this->searchProduct = '';
        $this->qty = '';
    }

    public function render()
    {

        $searchProduct = $this->searchProduct;
        //VALIDAÇÃO DE FOI INSERIDO UM PRODUTO NO INPUT
        if($searchProduct == true)
        {
            $product = Products::find($searchProduct); //VERIFICANDO SE EXISTE O CODIGO INFORMADO NO BANCO DE DADOS

            // VERIFICANDO SE EXISTE ALGUM RESULTADO
            if($product == true)
            {
                $this->ean = $product->EAN;
                $this->nome = $product->Nome;

                session()->flash('success', 'O produto: '. $this->nome.', foi encontrado.');

            }else{
                $this->ean = '';
                $this->nome = '';
                session()->flash('danger', 'O codigo e inválido ou não foi encontrado no banco de dados.');
                
            }
        }
        return view('licitacao.oef.add-oef-products');
    }
}
