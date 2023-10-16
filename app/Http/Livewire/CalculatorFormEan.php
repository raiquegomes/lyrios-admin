<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CalculatorFormEan extends Component
{
    public $number, $code;
    public function render()
    {
        return view('ean.calculator-form-ean');
    }
    public function calcultor()
    {
        $code = $this->code;
        $weightflag = true;
        $sum = 0;
        for ($i = strlen($code) - 1; $i >= 0; $i--) {
          $sum += (int)$code[$i] * ($weightflag?3:1);
          $weightflag = !$weightflag;
        }
        $this->clearInput();
        $this->number = $code.(10 - ($sum % 10)) % 10;
    }

    public function clearInput()
    {
        $this->number = '';
    }
}
