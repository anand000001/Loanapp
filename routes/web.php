<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SavingacController;
use App\Http\Controllers\GroupLoanController;
use App\Http\Controllers\EmireceiptController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\LoanRequestController;
use App\Http\Controllers\PersonalLoanController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmiController;



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

    Route::get('/permission/create', [PermissionController::class, 'create'])->name('permission.create');
    Route::get('/permission', [PermissionController::class, 'index'])->name('permission.index');
    Route::post('/permission/store', [PermissionController::class, 'store'])->name('permission.store');
    Route::get('/permission/{id}/edit', [PermissionController::class, 'edit'])->name('permission.edit');
    Route::get('/permission/{id}/show', [PermissionController::class, 'show'])->name('permission.show');
    Route::put('/permission/{id}', [PermissionController::class, 'update'])->name('permission.update');
    Route::delete('/permission/{id}', [PermissionController::class, 'destroy'])->name('permission.destroy');

    Route::get('/role/create', [RoleController::class, 'create'])->name('role.create');
    Route::get('/role', [RoleController::class, 'index'])->name('role.index');
    Route::post('/role/store', [RoleController::class, 'store'])->name('role.store');
    Route::get('/role/{id}/edit', [RoleController::class, 'edit'])->name('role.edit');
    Route::put('/role/{id}', [RoleController::class, 'update'])->name('role.update');
    Route::delete('/role/{id}', [RoleController::class, 'destroy'])->name('role.destroy');

    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');

    Route::resource('personalloans', PersonalLoanController::class);

    Route::resource('loanrequest', LoanRequestController::class);
    Route::put('/loanrequest/{id}/status', [LoanRequestController::class, 'updateStatus'])->name('loanrequest.updateStatus');
    Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');
    Route::resource('/cities', CityController::class);

    Route::resource('groups', GroupController::class);

    Route::resource('grouploans',GroupLoanController::class);

    Route::resource('emireceipts', EmireceiptController::class);


    Route::resource('savingacs', SavingacController::class);

    Route::resource('emis', EmiController::class);

});




