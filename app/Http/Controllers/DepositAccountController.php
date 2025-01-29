<?php

namespace App\Http\Controllers;

use App\Models\DepositAccount;
use App\Models\Client;
use App\Models\Quote;
use Illuminate\Http\Request;

class DepositAccountController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){
            $accounts = DepositAccount::with(['client', 'quote'])->select('deposit_accounts.*');

            return datatables()
                ->of($accounts)
                ->addColumn('client_name', function ($account) {
                    return $account->client->name ?? 'N/A';
                })
                ->addColumn('quote_folio', function ($account) {
                    return $account->quote->folio_no ?? 'N/A';
                })
                ->addColumn('action', function ($account) {
                    return '<a href="'.route('deposits.accounts.show', $account->id).'" class="btn btn-info btn-sm"><i class="fas fa-eye"></i>Detalles</a> ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('deposits.accounts.index');
    }

    public function create()
    {
        $clients = Client::all();
        $quotes = Quote::all();
        return view('deposits.accounts.registrarCuentaDeposito',compact('clients','quotes'));
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

    public function show(DepositAccount $depositAccount)
    {
        return view('deposits.accounts.show', compact('depositAccount'));
    }

    public function edit(DepositAccount $depositAccount)
    {
        $clients = Client::all();
        $quotes = Quote::all();

        return view('deposits.accounts.edit', compact('depositAccount','clients','quotes'));
    }

    public function update(Request $request, DepositAccount $depositAccount)
    {
        $validated = $request->validate([
           'client_id' => 'required|exists:clients,id',
           'quote_id' => 'required|exists:quotes,id',
           'total_cost' =>  'required|numeric|min:0',
           'initial_deposit' =>  'nullable|numeric|min:0',
           'payment_due_date' => 'required|date',
        ]);

        $depositAccount->update($validated);

        return redirect()->route('deposits.accounts.index')->with('success', 'Deposit account updated successfully.');
    }

    public function destroy(DepositAccount $depositAccount)
    {
        $depositAccount->delete();

        return redirect()->route('deposits.accounts.index')->with('success', 'Cuenta de depósito eliminada con éxito.');
    }
}
