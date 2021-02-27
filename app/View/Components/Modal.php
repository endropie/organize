<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Modal extends Component
{
    public $prop = [
        'persistent' => false,
        'fullscreen' => false,
    ];

    public function __construct($persistent = false, $fullscreen = false)
    {
        foreach ($this->prop as $key => $value) {
            $this->prop[$key] = ${$key} ?? $value;
        }
    }

    public function render()
    {
        return view('components.modal');
    }
}
