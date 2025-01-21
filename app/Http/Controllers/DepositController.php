<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\DepositAccount;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    public function index()
    {
        $deposits = Deposit::with('depositAccount')->get();
        return view('deposits.movements.index', compact('deposits'));
    }

    public function create()
    {
        $accounts = DepositAccount::all();
        return view('deposits.movements.create', compact('accounts'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
           'deposit_account_id' => 'required|exists:deposit_accounts,id',
           'amount' => 'required|numeric|min:0',
           'deposit_date' => 'required|date',
           'payment_method' => 'required|string',
           'deposit_type' => 'required|string|in:inicial,parcial,final',
        ]);

        $validated['user_id'] = auth()->id();

        Deposit::create($validated);

        return redirect()->route('deposits.movements.index')->with('success', 'Deposit registrado.');
    }
}
