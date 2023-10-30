<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use App\Models\Author;
use App\Models\Catalog;
use App\Models\Book;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publishers = Publisher::all();
        $authors = Author::all();
        $catalogs = Catalog::all();
        return view('book',compact('publishers','authors','catalogs'));
    }
    public function api()
    {
        $books = Book::all();

        return json_encode($books) ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }
 
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    // Membuat aturan validasi
    $rules = [
        'isbn' => 'required|between:6,9',
        'title' => 'required',
        'year' => 'required|integer|max:' . now()->year . '|date_format:Y', 
        'publisher_id' => 'required',
        'author_id' => 'required',
        'catalog_id' => 'required',
        'qty' => 'required|integer|min:1', 
        'price' => 'required|numeric|min:1000', 
    ];
    

    // Membuat pesan kustom untuk validasi
    $messages = [
        'isbn.required' => 'ISBN harus diisi.',
        'isbn.between' => 'ISBN harus memiliki setidaknya :min karakter.',
        'title.required' => 'Title harus diisi.',
        'year.required' => 'Year harus diisi.',
        'year.number' => 'Masukkan year yang benar.',
        'year.max' => 'Masukkan year yang benar.',
        'year.date_format' => 'Masukkan year yang benar.',
        'publisher_id.required' => 'Publisher harus diisi.',
        'author_id.required' => 'Author harus diisi.',
        'catalog_id.required' => 'Catalog harus diisi.',
        'qty.required' => 'Quantity harus diisi.',
        'qty.min' => 'Quantity harus minimal :min.',
        'price.required' => 'Price harus diisi.',
        'price.min' => 'Price harus minimal :min.',
    ];

    // Melakukan validasi
    $validator = Validator::make($request->all(), $rules, $messages);

    // Jika validasi gagal, kembali dengan pesan kesalahan
    if ($validator->fails()) {
        return redirect('books')
            ->withErrors($validator)
            ->withInput();
        }else{
            Book :: create($request->all());
            return redirect('books');
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    { 
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
    // Membuat aturan validasi
    $rules = [
        'isbn' => 'required|between:6,9',
        'title' => 'required',
        'year' => 'required|integer|max:' . now()->year . '|date_format:Y', 
        'publisher_id' => 'required',
        'author_id' => 'required',
        'catalog_id' => 'required',
        'qty' => 'required|integer|min:1', 
        'price' => 'required|numeric|min:1000', 
    ];
    

    // Membuat pesan kustom untuk validasi
    $messages = [
        'isbn.required' => 'ISBN harus diisi.',
        'isbn.between' => 'ISBN harus memiliki setidaknya :min karakter.',
        'title.required' => 'Title harus diisi.',
        'year.required' => 'Year harus diisi.',
        'year.number' => 'Masukkan year yang benar.',
        'year.max' => 'Masukkan year yang benar.',
        'year.date_format' => 'Masukkan year yang benar.',
        'publisher_id.required' => 'Publisher harus diisi.',
        'author_id.required' => 'Author harus diisi.',
        'catalog_id.required' => 'Catalog harus diisi.',
        'qty.required' => 'Quantity harus diisi.',
        'qty.min' => 'Quantity harus minimal :min.',
        'price.required' => 'Price harus diisi.',
        'price.min' => 'Price harus minimal :min.',
    ];
    // Melakukan validasi
    $validator = Validator::make($request->all(), $rules, $messages);

    // Jika validasi gagal, kembali dengan pesan kesalahan
    if ($validator->fails()) {
        return redirect('books')
            ->withErrors($validator)
            ->withInput();
    }else{
        $book->update($request->all());
        return redirect('books');
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
    }
}
