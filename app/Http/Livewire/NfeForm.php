<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\NFs;
use App\Models\NFs_slips;
use App\Models\Team;
use App\Models\Filial;

class NfeForm extends Component
{
    public $filial, $responsavel,$user_id, $access_key;
    public $slips = [];

    protected $rules = [
        'access_key' => 'required|min:44|max:44',
        'filial' => 'required',
        'slips' => 'exclude_if:status_motived, 3,4|required|',
        'slips.*.slips_key' => 'required|numeric',
    ];

    protected $messages = [
        'access_key.required' => 'Informe a chave de acesso da NFE (Nota Fiscal Eletronica)',

        'slips.required' => 'Por favor, insira as informações necessárias dos boletos da nota!',

        'slips.*.slips_key.required' => 'Informe o codigo de barra do boleto',
        'slips.*.slips_key.numeric' => 'O codigo de barra só aceita caracteres numericos.',
    ];

    public function render()
    {
        $this->team = Team::all();
        $this->filial_all = Filial::all();
        return view('NFe.nfe-form');
    }

    public function store()
    {
        $validatedData  = $this->validate();

        $createSlips = NFs::create([
            'access_key' => $this->access_key,
            'filial' => $this->filial,
        ]);

        foreach ($validatedData['slips'] as $slipsData) {
            $slip = new NFs_slips([
                'slips_key' => $slipsData['slips_key'],
            ]);
            $createSlips->slips()->save($slip);
        } 

        $this->resetCreateForm();
        $this->dispatchBrowserEvent('Swal:modal', [
            'type' => 'success',
            'title' => 'Sucesso!',
            'text' => 'A nota fiscal eletronica foi inserida com sucesso no sistema!',
        ]);
        $this->emit('refreshComponentnfeview');

    }

    public function addSlips()
    {
        $this->slips[] = [
            'slips_key' => '',
        ];
    }

    public function removeSlips($index)
    {
        unset($this->slips[$index]);
        $this->slips = array_values($this->slips);
    }

    private function resetCreateForm(){

        $this->access_key = '';
        $this->slips = [];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

}
