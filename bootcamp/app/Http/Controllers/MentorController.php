<?php

namespace App\Http\Controllers;

use App\Models\Mentor;
use Illuminate\Http\Request;

class MentorController extends Controller
{
    public function index()
    {
        $mentors = Mentor::all();

        return view('mentor', ['mentors' => $mentors]);
    }

    public function api()
    {
        $mentors = Mentor::with('nameclass')->get();
        $datatable = datatables()->of($mentors)->addIndexColumn();

        return $datatable->make(true);
    }

    public function store(Request $request)
    {
        $mentor = new Mentor;
        $mentor->name = $request->name;
        $mentor->specialization = $request->specialization;
        $mentor->phone_number = $request->phone_number;
        $mentor->save();

        return redirect('mentors')->with('success', 'Mentor created successfully.');
    }

    public function update(Request $request, $id)
    {
        $mentor = Mentor::find($id);
        if (!$mentor) {
            return redirect('mentors')->with('error', 'Mentor not found.');
        }

        $mentor->name = $request->name;
        $mentor->specialization = $request->specialization;
        $mentor->phone_number = $request->phone_number;
        $mentor->save();

        return redirect('mentors')->with('success', 'Mentor updated successfully.');
    }

    public function destroy(Mentor $mentor)
    {
        $mentor->delete();

        return redirect('mentors')->with('success', 'Mentor deleted successfully');
    }
}
