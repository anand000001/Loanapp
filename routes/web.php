<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonalLoanController;
use App\Http\Controllers\LoanRequestController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\GroupLoanController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SavingacController;


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

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');

    Route::get('/customer/create', [CustomerController::class, 'create'])->name('customer.create');
    Route::get('/customer', [CustomerController::class, 'index'])->name('customer.index');
    Route::post('/customer/store', [CustomerController::class, 'store'])->name('customer.store');
    Route::get('/customer/{id}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
    Route::get('/customer/{id}/show', [CustomerController::class, 'show'])->name('customer.show');
    Route::put('/customer/{id}', [CustomerController::class, 'update'])->name('customer.update');
    Route::delete('/customer/{id}', [CustomerController::class, 'destroy'])->name('customer.destroy');

    Route::get('/agent/create', [AgentController::class, 'create'])->name('agent.create');
    Route::get('/agent', [AgentController::class, 'index'])->name('agent.index');
    Route::post('/agent/store', [AgentController::class, 'store'])->name('agent.store');
    Route::get('/agent/{id}/edit', [AgentController::class, 'edit'])->name('agent.edit');
    Route::get('/agent/{id}/show', [AgentController::class, 'show'])->name('agent.show');
    Route::put('/agent/{id}', [AgentController::class, 'update'])->name('agent.update');
    Route::delete('/agent/{id}', [AgentController::class, 'destroy'])->name('agent.destroy');

});

Route::resource('personalloans', PersonalLoanController::class);

Route::resource('loanrequest', LoanRequestController::class);
Route::put('/loanrequest/{id}/status', [LoanRequestController::class, 'updateStatus'])->name('loanrequest.updateStatus');

Route::resource('/cities', CityController::class);

Route::resource('groups', GroupController::class);

Route::resource('grouploans',GroupLoanController::class);

Route::resource('savingacs', SavingacController::class);

