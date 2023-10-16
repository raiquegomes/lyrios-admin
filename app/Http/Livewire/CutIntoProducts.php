<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use RealRashid\SweetAlert\Facades\Alert;

use Livewire\Component;
use App\Models\Products;
use App\Models\CutProducts;
use App\Models\ProductsCutsFornecedores;

class CutIntoProducts extends Component
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
    
    public function CeasaPortaCut()
    {
        $this->validate([
            'searchProduct' => 'required',
            'ean' => 'required',
            'qty' => 'required|max:5',
            'filial' => 'required',
            'nome' => 'required',
        ]);
        $this->qty_formated = sprintf("%05d", $this->qty);


        ProductsCutsFornecedores::create([
            'internal_id' => $this->searchProduct,
            'Nome' => $this->nome,
            'user_id' => Auth::user()->id
        ]);

        CutProducts::create([
            'EAN' => $this->ean,
            'Qty' => $this->qty_formated,
            'Filial' => $this->filial,
        ]);

        $this->dispatchBrowserEvent('Swal:modal', [
            'type' => 'success',
            'title' => 'Sucesso!',
            'text' => 'O produto foi adicionado a lista de produtos compativeis para fornecedores Ceasa/Porta! O seu ID, foi gravado por garantia para a diretoria! ('.Auth::user()->name.')',
        ]);
        $this->resetCreateForm();

    }

    public function store()
    {
        $this->validate([
            'searchProduct' => 'required',
            'ean' => 'required',
            'qty' => 'required|max:5',
            'filial' => 'required',
        ]);

        if(ProductsCutsFornecedores::find($this->searchProduct))
        {

            $this->qty_formated = sprintf("%05d", $this->qty);

            CutProducts::updateOrCreate(['id' => $this->product_id], [
                'EAN' => $this->ean,
                'Qty' => $this->qty_formated,
                'Filial' => $this->filial,
            ]);

            $this->dispatchBrowserEvent('Swal:modal', [
                'type' => 'success',
                'title' => 'Sucesso!',
                'text' => 'O produto foi adicionado com sucesso aos registros de cortes!',
            ]);
            $this->emit('refreshComponentCut');
            $this->resetCreateForm();

        }else{

            $this->dispatchBrowserEvent('confirmation-ceasa-porta', [
                'type' => 'info',
                'title' => 'O produto faz parte do grupo Ceasa/Porta de fornecedores?',
            ]);

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
            $product = Products::where('internal_id', $searchProduct)->first(); //VERIFICANDO SE EXISTE O CODIGO INFORMADO NO BANCO DE DADOS

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
        return view('functions.cut-into-products');
    }
}
