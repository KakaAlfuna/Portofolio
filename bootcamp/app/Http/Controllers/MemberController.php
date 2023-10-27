<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\NameClass;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::all();
        $nameClasses = NameClass::all();
        
        return view('member',compact('members', 'nameClasses'));
    }
    public function api()
    {
        $members = Member::all();
        $datatables = datatables()->of($members)->addIndexColumn();

        return $datatables->make(true);
    }
    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'address' => 'required',
        //     'phone_number' => 'required',
        // ]);

        $member = new Member;
        $member->name = $request->name;
        $member->gender = $request->gender;
        $member->email = $request->email;
        $member->address = $request->address;
        $member->phone_number = $request->phone_number;
        $member->save();

        return redirect('members')->with('success', 'Member created successfully.');
    }
    public function update(Request $request, $id)
    {
        
        // $validatedData = $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'address' => 'required',
        //     'phone_number' => 'required',
        // ]);

        $member = Member::find($id);
        if (!$member) {
            return redirect('members')->with('error', 'Member not found.');
        }

        $member->name = $request->name;
        $member->gender = $request->gender;
        $member->email = $request->email;
        $member->address = $request->address;
        $member->phone_number = $request->phone_number;
        $member->save();

        return redirect('members')->with('success', 'Member updated successfully.');
    }
    public function destroy(Member $member)
    {
        $member->delete();

        return redirect('members')->with('success', 'Member deleted successfully');
    }



}
