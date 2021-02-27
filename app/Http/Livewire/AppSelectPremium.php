<?php

namespace App\Http\Livewire;

use App\Models\Premium;
use Livewire\Component;

class AppSelectPremium extends Component
{
    public $emit, $emitTo, $emitUp;
    public $model, $input, $search;
    public $optionValue = 'id';
    public $optionLabel;
    public $show = true;
    public $class, $style;

    public function mount($model, $define = null)
    {
        $this->model = $model;
        $this->input = $define;
        $this->search = $define;
    }

    public function updatedSearch($value)
    {
        if ($this->emit) $this->emit($this->emit, $this->model, $value);
        if ($this->emitTo) $this->emitTo($this->emitTo, $this->model, $value);
        if ($this->emitUp) {
            $this->emitUp($this->emitUp, $this->model, $value);
            // dd('emit', $this->emitUp, $this->model, $value);
        }
    }

    private function getOptions()
    {
        return Premium::whereNotNull('verified_at')->get()->map(function($item) {
            return [
                'value' => $item[$this->optionValue],
                'label' => $item[$this->optionLabel ?? $this->optionValue],
            ];
        });
    }

    public function render()
    {
        return view('livewire.app-select-premium', [
            'options' => $this->getOptions()
        ]);
    }
}
