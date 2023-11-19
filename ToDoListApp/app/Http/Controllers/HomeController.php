<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function api()
    {
        $tasks = Task::orderBy("created_at", "desc")->get();
        $datatable = datatables()->of($tasks)->addIndexColumn();

        return $datatable->make(true);
    }
    public function store(Request $request)
    {
        $task = new Task();
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->time_start = $request->input('time_start');
        $task->time_end = $request->input('time_end');
        $task->save();

        return redirect('home');
    }
    public function update(Request $request, $id)
    {
        $task = Task::find($id);
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->time_start = $request->input('time_start');
        $task->time_end = $request->input('time_end');
        $task->save();

        return redirect('home');
    }

    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
    }
}
