<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\DepositAccount;
use App\Models\Client;
use App\Models\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Nette\Schema\ValidationException;
use Yajra\DataTables\Facades\DataTables;

class DepositAccountController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){
            $accounts = DepositAccount::select('id','client_name','quote_folio','total_cost','initial_deposit','payment_deadline');

            return datatables()
                ->of($accounts)
                ->addColumn('remaining_balance',function($account){
                    return number_format($account->remaining_balance,2);//Formato de dinero
                })
                ->addColumn('action', function ($account) {
                    return '<a href="'.route('deposits.accounts.show', $account->id).'" class="btn btn-success btn-sm">Historial Depositos</a>';
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
            $validatedData = $request->validate([
                'client_id' => 'required|exists:clients,id',
                'quote_id' => 'required|exists:quotes,id',
                'client_name'=>'required|string',
                'quote_folio'=>'required|string|unique:deposit_accounts,quote_folio',
                'total_cost' => 'required|numeric|min:0',
                'initial_deposit' => 'required|numeric|min:0|lte:total_cost',//Se valida pero no se guarda en DepositAccount
                'payment_method' => "required|string",//Se valida pero no se guarda en DepositAccount
                'payment_deadline' => 'required|date|after_or_equal:today',
            ]);

            //Crea la cuenta de deposito con los campos validados
            $depositAccount = DepositAccount::create([
                'client_id' => $validatedData['client_id'],
                'quote_id' => $validatedData['quote_id'],
                'client_name' => $validatedData['client_name'],
                'quote_folio' => $validatedData['quote_folio'],
                'total_cost' => $validatedData['total_cost'],
                'payment_deadline' => $validatedData['payment_deadline'],
            ]);

            //Guardar el Deposito Inicial
            Deposit::create([
                'deposit_account_id' => $depositAccount->id,
                'amount' => $validatedData['initial_deposit'],
                'deposit_type' => 'inicial',
                'payment_date' => now(),
                'payment_method' => $validatedData['payment_method'],
                'user_id' => auth()->id(),
            ]);

            return redirect()->route('deposits.accounts.index')->with('success', 'Deposito registrado exitosamente');
    }

    public function show($id)
    {
        //Buscar la cuenta de deposito con su cliente y cotizacion
        $account = DepositAccount::with(['client','quote'])->findOrFail($id);
        return view('deposits.accounts.show', compact('account'));
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
           'payment_deadline' => 'required|date',
        ]);

        $depositAccount->update($validated);

        return redirect()->route('deposits.accounts.index')->with('success', 'Deposit account updated successfully.');
    }

    public function destroy(DepositAccount $depositAccount)
    {
        $depositAccount->delete();

        return redirect()->route('deposits.accounts.index')->with('success', 'Cuenta de depósito eliminada con éxito.');
    }

    public function getDepositAccountsData()
    {
        $accounts = DepositAccount::with('deposits','client','quote')->select('deposit_accounts.*');

        /*dd($accounts->get());*/
        return DataTables::of($accounts)
            ->addColumn('client_name', function ($account) {
                return $account->client ? $account->client->first_name.' '.$account->client->last_name : 'N/A';
            })
            ->addColumn('quote_folio', function ($account) {
                return $account->quote ? $account->quote->folio: 'N/A';
            })
            //prueba de Total Cost
            ->addColumn('total_cost', function ($account) {
                return number_format($account->total_cost,2);
            })
            ->addColumn('initial_deposit', function ($account) {
                $initialDeposit = $account->deposits()->where('deposit_type', 'inicial')->first();
                return $initialDeposit ? number_format($initialDeposit->amount,2) : 'No Registrado';
            })
            ->addColumn('remaining_balance', function ($account) {
                $totalDeposits = $account->deposits()->sum('amount');
                return number_format($account->total_cost - $totalDeposits,2);
            })
            ->addColumn('action', function ($account) {
                return '<button class="btn btn-success btn-sm register-deposit"
                            data-id="'.$account->id.'"
                            data-client="'.$account->client->first_name.' '.$account->client->last_name.'"
                            data-bs-toggle="modal"
                            data-bs-target="#registerDepositModal"
                            <i class="fas fa-dollar-sign"></i> Registrar Deposito
                        </button>
                        <a href="'.route('deposits.movements.history', $account->id).'" class="btn btn-secondary btn-sm">
                            <i class="fas fa-list"></i> Historial
                        </a>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
