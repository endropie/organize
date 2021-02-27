<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HasWireDialog
{
    public $show;
    public $dialog;

    public function setDialog($option = [])
    {
        if (method_exists($this, 'dialogCreating')) $option = $this->dialogCreating($option);

        $this->dialog = $option;

        $this->show = true;

        if (method_exists($this, 'dialogCreated')) $this->dialogCreated();
    }
    public function setClose()
    {
        if (method_exists($this, 'dialogClosing') && $this->dialogClosing()) return false;

        $this->reset('show', 'dialog', 'record');
        if (method_exists($this, 'init')) $this->init();
        if (method_exists($this, 'dialogClosed')) $this->dialogClosed();
    }

    public function offsetClick()
    {
        $this->setClose();
    }
}
