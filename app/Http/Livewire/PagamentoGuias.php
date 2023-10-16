<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\TicketPagamentoFinanceiro;
use App\Models\Team;
use App\Models\Filial;


class PagamentoGuias extends Component
{
    use WithPagination;

    public $filial, $responsavel, $description, $status_motived, $section, $user_id;

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
    ];

    public function render()
    {
        $this->team = Team::all();
        $this->filial_all = Filial::all();
        return view('payments.pagamento-guias', ['tickets' => TicketPagamentoFinanceiro::orderByDesc('created_at')->simplePaginate(10),]);
    }
}
