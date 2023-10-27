<?php

namespace App\Http\Controllers;

use App\Models\NameClass;
use App\Models\Member;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class NameClassController extends Controller
{
    public function index()
    {
        $nameClasses = NameClass::with("members")->get();
        $members = Member::all();

        return view('nameClass', compact('nameClasses', 'members'));
    }

    public function api()
    {
        $nameClasses = NameClass::with('members')->get();
        $datatable = DataTables::of($nameClasses)->addIndexColumn();
    
        return $datatable->make(true);
    }
    
    

    public function store(Request $request)
    {

        $nameClass = new NameClass;
        $nameClass->name_class = $request->name_class;
        $nameClass->description = $request->description;
        $nameClass->save();

        return redirect('nameClasses')->with('success', 'NameClass created successfully.');
    }

    public function update(Request $request, $id)
    {

        $nameClass = NameClass::find($id);
        if (!$nameClass) {
            return redirect('nameClasses')->with('error', 'NameClass not found.');
        }

        $nameClass->name_class = $request->name_class;
        $nameClass->description = $request->description;
        $nameClass->save();

        return redirect('nameClasses')->with('success', 'NameClass updated successfully.');
    }

    public function destroy(NameClass $nameClass)
    {

        $nameClass->delete();

        return redirect('nameClasses')->with('success', 'NameClass deleted successfully');
    }

    public function show(NameClass $nameClass)
    {
        $schedules = Schedule::where('class_id', $nameClass->id)->get();

        // return $schedules;
        return view('schedule', compact('nameClass', 'schedules'));
    }
    
}
