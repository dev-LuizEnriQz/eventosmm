<?php

namespace App\Http\Controllers;

use App\Models\DepositAccount;
use App\Models\Client;
use App\Models\Quote;
use Illuminate\Http\Request;

class DepositAccountController extends Controller
{
    public function index()
    {
        $accounts = DepositAccount::with(['client', 'quote'])->get();
        return view('deposits.accounts.index', compact('accounts'));
    }

    public function create()
    {
        $clients = Client::all();
        $quotes = Quote::all();
        return view('deposits.accounts.create', compact('clients', 'quotes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
           'client_id' => 'required|exists:clients,id',
           'quote_id' => 'required|exists:quotes,id',
           'total_cost' =>  'required|numeric|min:0',
           'initial_deposit' =>  'nullable|numeric|min:0',
           'payment_due_date' => 'required|date',
        ]);

        DepositAccount::create($validated);

        return redirect()->route('deposits.accounts.index')->with('success', 'Deposit account created successfully.');
    }
}
