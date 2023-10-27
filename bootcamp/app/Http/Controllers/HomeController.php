<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Mentor;
use App\Models\NameClass;
use App\Models\Transaction;
use App\Models\User;
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
        $transactions = Transaction::all();
        $members = Member::all();
        $mentors = Mentor::all();
        $class = NameClass::all();
        $users = User::all();
        return view('home',compact('transactions', 'members', 'mentors', 'class', 'users'));
    }
}
