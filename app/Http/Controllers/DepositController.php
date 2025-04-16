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
        return view('deposits.movements.registrarDeposito', compact('accounts'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
           'deposit_account_id' => 'required|exists:deposit_accounts,id',
           'amount' => 'required|numeric|min:0',
           'deposit_type' => 'required|string|in:inicial,parcial,final',
           'payment_method' => 'required|string',
           'payment_date' => 'required|date',
        ]);

        Deposit::create([
           'deposit_account_id' => $validatedData['deposit_account_id'],
            'amount' => $validatedData['amount'],
            'deposit_type' => $validatedData['deposit_type'],
            'payment_method' => $validatedData['payment_method'],
            'payment_date' => $validatedData['payment_date'],
            'user_id' => auth()->id(),
        ]);

        return response()->json([
            'message' => 'Deposito registrado exitosamente'
        ],200);
    }
}
