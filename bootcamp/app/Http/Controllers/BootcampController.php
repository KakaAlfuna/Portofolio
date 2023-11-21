<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bootcamp;
use App\Models\Member;
use App\Models\NameClass;
use App\Models\Transaction;

class BootcampController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        $members = Member::all();
        $nameClasses = NameClass::all();

        return view('bootcamp', compact('transactions', 'members', 'nameClasses'));
    }

    public function api()
    {
        $nameClasses = NameClass::all();
        $datatable = datatables()->of($nameClasses)->addIndexColumn();

        return $datatable->make(true);
    }

    public function store(Request $request)
    {
        $transaction = new Transaction;
        $transaction->member_id = $request->member_id;
        $transaction->class_id = $request->class_id;
        $transaction->amount = 100.00;
        $transaction->method = 'DANA';
        $transaction->transaction_date = now()->subDays();
        $transaction->save();

        return redirect('bootcamps')->with('success', 'Transaction successfully.');
    }

    public function checkout(Request $request)
    {
        try {
            // Ambil data yang dikirim dari frontend
            $cartItems = $request->input('cart');
            // Simpan setiap item keranjang sebagai transaksi di database
            foreach ($cartItems as $cartItem) {
                $transaction = new Transaction;
                $transaction->member_id = $cartItem['member_id'];
                $transaction->class_id = $cartItem['id'];
                $transaction->amount = 100; // Ubah sesuai dengan logika Anda
                $transaction->method = 'DANA'; // Ubah sesuai dengan metode pembayaran
                $transaction->transaction_date = now()->subDays(); // Sesuaikan dengan tanggal transaksi
    
                $transaction->save();
            }
    
            // Berikan respons ke frontend bahwa proses checkout berhasil
            return response()->json(['message' => 'Checkout berhasil'], 200);
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            return response()->json(['message' => 'Gagal melakukan checkout'], 500);
        }
    }
    
}
