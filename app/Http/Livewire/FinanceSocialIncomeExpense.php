<?php

namespace App\Http\Livewire;

use App\Models\Ledger;
use Livewire\Component;

class FinanceSocialIncomeExpense extends Component
{
    public function render()
    {
        return view('livewire.finance-social-income-expense', [
            'income' => Ledger::code(4112)->saldo,
            'expense' => Ledger::code(5112)->saldo,
            'summary' => Ledger::code(4112)->saldo - Ledger::code(5112)->saldo,
        ]);
    }
}
