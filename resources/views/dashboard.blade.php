@extends('layouts.app')
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Dashboard') }}
    </h2>
@endsection
@section('content')

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 p-4">
    <!-- Today Recovery Card -->
    <div class="bg-gradient-to-r from-green-400 to-blue-500 text-white shadow-lg rounded-lg p-6">
        <div class="flex items-center">
            <div class="w-16 h-16 bg-white text-green-500 rounded-full flex items-center justify-center">
                <i class="fas fa-dollar-sign text-3xl"></i>
            </div>
            <div class="ml-4">
                <h4 class="text-xl font-bold">Today's Recovery</h4>
                <p class="text-2xl font-semibold">$4,500</p>
            </div>
        </div>
    </div>

    <!-- Today Due Card -->
    <div class="bg-gradient-to-r from-red-400 to-pink-500 text-white shadow-lg rounded-lg p-6">
        <div class="flex items-center">
            <div class="w-16 h-16 bg-white text-red-500 rounded-full flex items-center justify-center">
                <i class="fas fa-clock text-3xl"></i>
            </div>
            <div class="ml-4">
                <h4 class="text-xl font-bold">Today's Due</h4>
                <p class="text-2xl font-semibold">$1,200</p>
            </div>
        </div>
    </div>

    <!-- Total Collected Card -->
    <div class="bg-gradient-to-r from-yellow-400 to-orange-500 text-white shadow-lg rounded-lg p-6">
        <div class="flex items-center">
            <div class="w-16 h-16 bg-white text-yellow-500 rounded-full flex items-center justify-center">
                <i class="fas fa-wallet text-3xl"></i>
            </div>
            <div class="ml-4">
                <h4 class="text-xl font-bold">Total Collected</h4>
                <p class="text-2xl font-semibold">$25,800</p>
            </div>
        </div>
    </div>

    <!-- Customers Card -->
    <div class="bg-gradient-to-r from-indigo-400 to-purple-500 text-white shadow-lg rounded-lg p-6">
        <div class="flex items-center">
            <div class="w-16 h-16 bg-white text-indigo-500 rounded-full flex items-center justify-center">
                <i class="fas fa-users text-3xl"></i>
            </div>
            <div class="ml-4">
                <h4 class="text-xl font-bold">Customers</h4>
                <p class="text-2xl font-semibold">1,230</p>
            </div>
        </div>
    </div>

    <!-- Agents Card -->
    <div class="bg-gradient-to-r from-teal-400 to-cyan-500 text-white shadow-lg rounded-lg p-6">
        <div class="flex items-center">
            <div class="w-16 h-16 bg-white text-teal-500 rounded-full flex items-center justify-center">
                <i class="fas fa-user-tie text-3xl"></i>
            </div>
            <div class="ml-4">
                <h4 class="text-xl font-bold">Agents</h4>
                <p class="text-2xl font-semibold">85</p>
            </div>
        </div>
    </div>
    <div class="bg-gradient-to-r from-orange-400 to-red-500 text-white shadow-lg rounded-lg p-6">
        <div class="flex items-center">
            <div class="w-16 h-16 bg-white text-orange-500 rounded-full flex items-center justify-center">
                <i class="fas fa-exclamation-circle text-3xl"></i>
            </div>
            <div class="ml-4">
                <h4 class="text-xl font-bold">Pending Approvals</h4>
                <p class="text-2xl font-semibold">32</p>
            </div>
        </div>
    </div>

    <!-- Completed Tasks Card -->
    <div class="bg-gradient-to-r from-green-500 to-teal-500 text-white shadow-lg rounded-lg p-6">
        <div class="flex items-center">
            <div class="w-16 h-16 bg-white text-green-500 rounded-full flex items-center justify-center">
                <i class="fas fa-check-circle text-3xl"></i>
            </div>
            <div class="ml-4">
                <h4 class="text-xl font-bold">Completed Tasks</h4>
                <p class="text-2xl font-semibold">85</p>
            </div>
        </div>
    </div>
    <div class="bg-gradient-to-r from-purple-500 to-blue-500 text-white shadow-lg rounded-lg p-6">
        <div class="flex items-center">
            <div class="w-16 h-16 bg-white text-purple-500 rounded-full flex items-center justify-center">
                <i class="fas fa-user-plus text-3xl"></i>
            </div>
            <div class="ml-4">
                <h4 class="text-xl font-bold">New Registrations</h4>
                <p class="text-2xl font-semibold">124</p>
            </div>
        </div>
    </div>
</div>
@endsection

