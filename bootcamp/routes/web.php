<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\NameClassController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resources([
	'home' => HomeController::class,
    'members'=> MemberController::class,
    'mentors'=> MentorController::class,
    'nameClasses'=> NameClassController::class,
    'schedules'=> ScheduleController::class,
    'transactions'=> TransactionController::class,
]);


Route::get('/api/members', [App\Http\Controllers\MemberController::class, 'api']);
Route::get('/api/nameClasses', [App\Http\Controllers\NameClassController::class, 'api']);
Route::get('/api/mentors', [App\Http\Controllers\MentorController::class, 'api']);
Route::get('/api/transactions', [App\Http\Controllers\TransactionController::class, 'api']);