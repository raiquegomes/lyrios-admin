<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
class CreateTicketRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'filial' => 'required',
            'description' => 'exclude_if:status_motived, 1|required',
            'status_motived' => 'required',
            'responsavel' => 'required',
            'section' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'filial.required' => 'Informe a filial que destina-se o ticket.',
            'status_motived.required' => 'Informe o motivo da abertura do ticket.',
            'responsavel.required' => 'Informe o responsavel pelo departamento desse produto.',
            'section.required' => 'E de extrema importância o nome do lugar que destina-se o processo!',
            'description.required' => 'Digite as informações necessárias',
    
            'EAN.required' => 'Informe o codigo de barra do produto',
            'Qty.required' => 'Informe a quantidade correta ou aproximada de produtos desta data de validade.',
            'Validated.required' => 'Informe a data de validade do produto',
    
            'EAN.*.required' => 'Informe o codigo de barra do produto',
            'Qty.*.required' => 'Informe a quantidade correta ou aproximada de produtos desta data de validade.',
            'Validated.*.required' => 'Informe a data de validade do produto',
        ];
    }
}
