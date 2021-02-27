<?php

namespace App\Http\Livewire;

use App\Models\Ledger;
use Livewire\Component;

class FinanceGeneralIncomeExpense extends Component
{
    public function render()
    {
        return view('livewire.finance-general-income-expense', [
            'income' => Ledger::code(4000)->saldo,
            'expense' => Ledger::code(5000)->saldo,
            'summary' => Ledger::code(4000)->saldo - Ledger::code(5000)->saldo,
        ]);
    }
}
