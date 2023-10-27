<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\NameClass;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        $members = Member::all();
        $nameClasses = NameClass::all();

        return view('transaction', compact('transactions', 'members', 'nameClasses'));
    }
    public function api()
    {
        $transactions = Transaction::with('nameclass','member')->get();
        $datatable = datatables()->of($transactions)->addIndexColumn();

        return $datatable->make(true);
    }

    public function store(Request $request)
    {
        $transaction = new Transaction;
        $transaction->member_id = $request->member_id;
        $transaction->class_id = $request->class_id;
        $transaction->amount = 100.00;
        $transaction->method = $request->method;
        $transaction->transaction_date = now()->subDays();
        $transaction->save();

        return redirect('transactions')->with('success', 'Transaction created successfully.');
    }

    public function update(Request $request, $id)
    {
        $transaction = Transaction::find($id);
        if (!$transaction) {
            return redirect('transactions')->with('error', 'Transaction not found.');
        }

        $transaction = new Transaction;
        $transaction->member_id = $request->member_id;
        $transaction->class_id = $request->class_id;
        $transaction->amount = 100.00;
        $transaction->method = $request->method;
        $transaction->transaction_date = now()->subDays();
        $transaction->save();

        return redirect('transactions')->with('success', 'Transaction updated successfully.');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return redirect('transactions')->with('success', 'Transaction deleted successfully');
    }
}
