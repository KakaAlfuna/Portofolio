<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $transactions = Transaction::all();
        $members = Member::all();
        $books = Book::all();

        return view('admin.transaction.index', compact('transactions', 'members', 'books'));
    }

    public function api()
    {
        $transactions = Transaction::with('member')->get();
        $transactionDetails = TransactionDetail::with('book')->get();
        
        $combinedData = $transactions->map(function ($transaction) use ($transactionDetails) {
            $details = $transactionDetails->where('transaction_id', $transaction->id)->all();
            $transaction->details = $details;
            
            return $transaction;
        });

        $allData = $combinedData->map(function ($transaction) {
            $totalPrice = 0;
            $totalBooks = 0;

            foreach ($transaction->details as $detail) {
                $totalPrice += $detail->book->price * $detail->qty;
                $totalBooks += $detail->qty;
            }
                      
            $status = $transaction->date_end ? 'done' : 'borrowing';

            return compact('transaction', 'status', 'totalPrice', 'totalBooks');
        });
        return json_encode($allData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $transactions = Transaction::all();
        $members = Member::all();
        $books = Book::all();
        return view('admin.transaction.create', compact('transactions', 'members', 'books'));
    }
 
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'date_start' => 'required|date',
            'member_id' => 'required',
            'book_id' => 'required|array',
        ];
    
        $messages = [
            'date_start.required' => 'Tanggal harus diisi.',
            'date_start.date' => 'Masukkan tanggal dengan benar.',
            'member_id.required' => 'Pilih anggota.',
            'book_id.required' => 'Pilih buku.',
            'book_id.array' => 'Buku harus berupa array.',
        ];
    
        $validator = Validator::make($request->all(), $rules, $messages);
    
        if ($validator->fails()) {
            return redirect()->route('transactions.create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $transaction = new Transaction();
            $transaction->date_start = $request->input('date_start');
            $transaction->date_end = $request->input('date_end');
            $transaction->member_id = $request->input('member_id');
            $transaction->save();
    
            foreach ($request->input('book_id') as $key => $bookId) {
                $transactionDetail = new TransactionDetail();
                $transactionDetail->transaction_id = $transaction->id;
                $transactionDetail->book_id = $bookId;
                $transactionDetail->qty = 1;
                $transactionDetail->save();
    
                // Mengurangi jumlah buku yang tersedia
                $book = Book::find($bookId);
                if ($book) {
                    $book->qty -= 1;
                    $book->save();
                }
            }
    
            return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil dibuat.');
        }
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        $transactionDetails = TransactionDetail::where('transaction_id', $transaction->id)->get();
        $books = Book::whereIn('id', $transactionDetails->pluck('book_id'))->get();

        return $transaction;
        return view('admin.transaction.show', compact('transaction', 'books'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        $members = Member::all();
        $books = Book::all();
        $selectedBooks = $transaction->transactionDetails()->pluck('book_id')->toArray();
        return view('admin.transaction.edit', compact('transaction', 'books', 'members', 'selectedBooks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        $rules = [
            'date_start' => 'required|date',
            'member_id' => 'required',
            'status' => 'required|in:borrowing,done', // Menambahkan aturan validasi untuk status
        ];
    
        $messages = [
            'date_start.required' => 'Tanggal harus diisi.',
            'date_start.date' => 'Masukkan tanggal dengan benar.',
            'member_id.required' => 'Pilih anggota.',
            'status.required' => 'Pilih status transaksi.',
            'status.in' => 'Status harus salah satu dari: borrowing, done.',
        ];
    
        $validator = Validator::make($request->all(), $rules, $messages);
    
        if ($validator->fails()) {
            return redirect()->route('transactions.edit', $transaction->id)
                ->withErrors($validator)
                ->withInput();
        } else {
            $transaction->date_start = $request->input('date_start');
            $transaction->date_end = $request->input('date_end');
            $transaction->member_id = $request->input('member_id');
            $transaction->save();
    
            // Menangani penambahan atau pengurangan qty berdasarkan status
            foreach ($transaction->details as $detail) {
                $book = Book::find($detail->book_id);
                if ($book) {
                    if ($request->input('status') === 'done') {
                        $book->qty += 1;
                    } elseif ($request->input('status') === 'borrowing') {

                    }
                    $book->save();
                }
            }
    
            return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil diperbarui.');
        }
    }
    
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil dihapus.');
    }
}
