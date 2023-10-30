<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::with('Books')->get();
        return view('author',compact('authors'));
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
        'name' => 'required|min:5',
        'email' => 'required|email|unique:authors,email',
        'phone_number' => 'required|between:12,15',
        'address' => 'required',
    ];

    // Membuat pesan kustom untuk validasi
    $messages = [
        'name.required' => 'Name harus diisi.',
        'name.min' => 'Name harus memiliki setidaknya :min karakter.',
        'email.required' => 'Email harus diisi.',
        'email.email' => 'Gunakan email yang benar.',
        'email.unique' => 'Email telah digunakan.',
        'phone_number.required' => 'Phone Number harus diisi.',
        'phone_number.between' => 'Gunakan phone number yang benar.',
        'address.required' => 'Address haru diisi.',
    ];

    // Melakukan validasi
    $validator = Validator::make($request->all(), $rules, $messages);

    // Jika validasi gagal, kembali dengan pesan kesalahan
    if ($validator->fails()) {
        return redirect('authors')
            ->withErrors($validator)
            ->withInput();
    }else{
        Author :: create($request->all());

        return redirect('authors');
    }


        // $this->validate($request,[
        //     'name' => ['required'],
        //     'email' => ['required'],
        //     'phone_number' => ['required'],
        //     'address' => ['required'],
        // ]);
        
        // Author :: create($request->all());

        // return redirect('authors');
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    { 
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        return view('admin.author.edit',compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
    // Membuat aturan validasi
    $rules = [
        'name' => 'required|min:5',
        'email' => 'required|email|unique:authors,email',
        'phone_number' => 'required|between:12,15',
        'address' => 'required',
    ];

    // Membuat pesan kustom untuk validasi
    $messages = [
        'name.required' => 'Name harus diisi.',
        'name.min' => 'Name harus memiliki setidaknya :min karakter.',
        'email.required' => 'Email harus diisi.',
        'email.email' => 'Gunakan email yang benar.',
        'email.unique' => 'Email telah digunakan.',
        'phone_number.required' => 'Phone Number harus diisi.',
        'phone_number.between' => 'Gunakan phone number yang benar.',
        'address.required' => 'Address haru diisi.',
    ];

    // Melakukan validasi
    $validator = Validator::make($request->all(), $rules, $messages);

    // Jika validasi gagal, kembali dengan pesan kesalahan
    if ($validator->fails()) {
        return redirect('authors')
            ->withErrors($validator)
            ->withInput();
    }else{
        $author->update($request->all());

        return redirect('authors');
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $author->delete();
    }
}
