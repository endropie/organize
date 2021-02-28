<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Premiables extends Component
{
    public $premium;
    public $pivot = [];

    public function mount($premium) {

        $this->premium = $premium;

        $this->addPivot();
        $this->previousPivot();
        $this->previousPivot();
        $this->nextPivot();
        $this->nextPivot();

    }

    protected function addPivot($v = null)
    {
        $months = [1,2,3,4,5,6,7,8,9,10,11,12];
        $this->pivot[$v ?? now()->format('Y')] = $months;
    }

    public function previousPivot()
    {
        $min = collect(array_keys($this->pivot))->min();
        $this->addPivot($min-1);
    }

    public function nextPivot()
    {
        $max = collect(array_keys($this->pivot))->max();
        $this->addPivot($max+1);
    }

    public function render()
    {
        return view('livewire.premiables');
    }
}
