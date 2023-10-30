<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $catalogs = Catalog::with('Books')->get();
        return view('admin.catalog.index',compact('catalogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.catalog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    // Membuat aturan validasi
    $rules = [
        'name' => 'required|min:5',
    ];

    // Membuat pesan kustom untuk validasi
    $messages = [
        'name.required' => 'Name harus diisi.',
        'name.min' => 'Name harus memiliki setidaknya :min karakter.',
    ];

    // Melakukan validasi
    $validator = Validator::make($request->all(), $rules, $messages);

    // Jika validasi gagal, kembali dengan pesan kesalahan
    if ($validator->fails()) {
        return redirect('catalogs/create')
            ->withErrors($validator)
            ->withInput();
    }else{
        Catalog :: create($request->all());

        return redirect('catalogs');
    }

    // Jika validasi berhasil, lanjutkan dengan menyimpan data atau melakukan tindakan lain yang diperlukan
    // ...
        // $this->validate($request,[
        //     'name' => ['required'],
        // ]);
               

    }

    /**
     * Display the specified resource.
     */
    public function show(Catalog $catalog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Catalog $catalog)
    {
        return view('admin.catalog.edit',compact('catalog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Catalog $catalog)
    {
    // Membuat aturan validasi
    $rules = [
        'name' => 'required|min:5',
    ];

    // Membuat pesan kustom untuk validasi
    $messages = [
        'name.required' => 'Name harus diisi.',
    ];

    // Melakukan validasi
    $validator = Validator::make($request->all(), $rules, $messages);

    // Jika validasi gagal, kembali dengan pesan kesalahan
    if ($validator->fails()) {
        return redirect('catalogs/'.$catalog->id.'/edit')
            ->withErrors($validator)
            ->withInput();
    }else{
        $catalog->update($request->all());

        return redirect('catalogs');
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Catalog $catalog)
    {
        $catalog->delete();
        return redirect('catalogs');
    }
}
