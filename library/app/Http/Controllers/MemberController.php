<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('member');
    }
    public function api()
    {
        $members = Member::all();
        $datatables = datatables()->of($members)->addIndexColumn();

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
        'gender' => 'required',
        'email' => 'required|email|unique:members,email',
        'phone_number' => 'required|between:12,15',
        'address' => 'required',
    ];

    // Membuat pesan kustom untuk validasi
    $messages = [
        'name.required' => 'Name harus diisi.',
        'name.min' => 'Name harus memiliki setidaknya :min karakter.',
        'gender.required' => 'Gender harus diisi.',
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
        return redirect('members')
            ->withErrors($validator)
            ->withInput();
    }else{
        Member :: create($request->all());

        return redirect('members');
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    { 
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
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
        return redirect('members')
            ->withErrors($validator)
            ->withInput();
    }else{
        $member->update($request->all());

        return redirect('members');
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        $member->delete();
    }
}
