<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FinanceGeneralGrafic extends Component
{
    public function render()
    {
        return view('livewire.finance-general-grafic', [
            'summary' => [
                1 => 0, //4500000,
                2 => 0, //1000000,
                3 => 0, //23000000,
            ],
            'persentase' => [
                1 => 0,
                2 => 0,
                3 => 0,
            ],
        ]);
    }
}
