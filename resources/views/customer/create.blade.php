@extends('layouts.app')
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Create Customer') }}
    </h2>
@endsection
@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h5>Customer Create</h5>
        </div>
        <div class="border-line"></div>
        <div class="card-body">
            <form action="{{ route('customer.store') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <!-- Row 1 -->
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Enter full name">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Enter email">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone:</label>
                            <input type="text" id="phone" name="phone" class="form-control" placeholder="Enter phone number">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="whatsapp_number" class="form-label">Whatsapp Number:</label>
                            <input type="text" id="whatsapp_number" name="whatsapp_number" class="form-control" placeholder="Enter WhatsApp number">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="aadhaar_number" class="form-label">Aadhaar Number:</label>
                            <input type="text" id="aadhaar_number" name="aadhaar_number" class="form-control" placeholder="Enter Aadhaar number">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="created_by" class="form-label">Created By:</label>
                            <input type="text" id="created_by" name="created_by" class="form-control" placeholder="Enter creator's name">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="permanent_address" class="form-label">Permanent Address:</label>
                            <input type="text" id="permanent_address" name="permanent_address" class="form-control" placeholder="Enter permanent address">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="local_address" class="form-label">Local Address:</label>
                            <input type="text" id="local_address" name="local_address" class="form-control" placeholder="Enter local address">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Enter password">
                        </div>
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
    
@endsection