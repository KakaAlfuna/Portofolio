<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('publisher');
    }
    public function api()
    {
        $publishers = Publisher::all();
        $datatables = datatables()->of($publishers)->addIndexColumn();

        return $datatables->make(true);
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
        'email' => 'required|email|unique:publishers,email',
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
        return redirect('publishers')
            ->withErrors($validator)
            ->withInput();
    }else{
        Publisher :: create($request->all());

        return redirect('publishers');
    }


        // $this->validate($request,[
        //     'name' => ['required'],
        //     'email' => ['required'],
        //     'phone_number' => ['required'],
        //     'address' => ['required'],
        // ]);
        
        // Publisher :: create($request->all());

        // return redirect('publishers');
    }

    /**
     * Display the specified resource.
     */
    public function show(Publisher $publisher)
    { 
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publisher $publisher)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Publisher $publisher)
    {
    // Membuat aturan validasi
    $rules = [
        'name' => 'required|min:5',
        'email' => 'required|email',
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
        return redirect('publishers')
            ->withErrors($validator)
            ->withInput();
    }else{
        $publisher->update($request->all());

        return redirect('publishers');
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publisher $publisher)
    {
        $publisher->delete();
    }
}
