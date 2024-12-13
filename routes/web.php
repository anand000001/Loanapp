<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonalLoanController;
use App\Http\Controllers\LoanRequestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::resource('personalloans', PersonalLoanController::class);

Route::resource('loanrequest', LoanRequestController::class);
Route::put('/loanrequest/{id}/status', [LoanRequestController::class, 'updateStatus'])->name('loanrequest.updateStatus');

