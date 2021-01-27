<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Pagination extends Component
{
    public $paginator;
    public $navigation = [
        'first' => false,
        'previous' => false,
        'next' => false,
        'last' => false
    ];

    public function __construct($paginator)
    {
        $this->paginator = $paginator;
        $this->navigation['first']      = $this->paginator->currentPage() > 1 ? 1 : null;
        $this->navigation['previous']   = $this->paginator->currentPage() > 1 ? $this->paginator->currentPage() -1 : null;
        $this->navigation['next'] = $this->paginator->lastPage() > $this->paginator->currentPage() ? $this->paginator->currentPage() +1 : null;
        $this->navigation['last'] = $this->paginator->lastPage() > $this->paginator->currentPage() ? $this->paginator->lastPage() : null;
    }

    public function render()
    {
        return view('components.pagination');
    }
}
