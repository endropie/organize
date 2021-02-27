<?php

namespace App\Http\Controllers;

use App\Models\Ledger;
use App\Models\Member;
use App\Models\Premium;
use App\Models\Transaction;
use Illuminate\Http\Request;

class Finances extends Controller
{
    public function index (Request $request)
    {
        return view('pages.finances-index');
    }

    public function transactions (Request $request)
    {
        $transactions = Transaction::latest()->paginate(request('limit', 10));

        return view('pages.finances-transactions-index', ['transactions' => $transactions]);
    }

}
