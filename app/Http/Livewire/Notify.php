<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Notify extends Component
{
    protected $listeners = ['webiste.notify' => 'setMessage', 'website.notify.clear' => 'setClear'];

    public $notifies = [];

    public $colors = [
        'info' => 'text-white',
        'warning' => 'text-yellow-700',
        'error' => 'text-white',
        'success' => 'text-white'
    ];

    public $bgcolors = [
        'info' => 'bg-blue-500',
        'warning' => 'bg-yellow-300',
        'error' => 'bg-red-700',
        'success' => 'bg-green-600'
    ];

    public function setMessage($notify)
    {
        $index = now()->format('Uu') . rand(100, 9999);

        $this->notifies[$index] = array_merge([
            'title' => null,
            'message' => null,
            'type' => 'info'
        ], $notify);

        $this->emitSelf('website.notify.clear', $index, intval($notify['limit'] ?? 2));
    }

    public function setClear($index, $limit)
    {
        sleep($limit);

        unset($this->notifies[$index]);
    }

    public function render()
    {
        return view('livewire.notify');
    }
}
