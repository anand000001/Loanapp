@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Saving Ac') }}
    </h2>
@endsection

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h5>Saving Ac</h5>
        </div>
        <div class="border-line"></div>
        <div class="card-body">
            <form method="POST" action="{{ route('savingacs.store') }}">
                @csrf 
                <div class="row g-3">
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Enter full name" required>
                            <small class="form-text text-muted">Please enter your full name</small>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Enter email" required>
                            <small class="form-text text-muted">Please enter your email</small>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="mobile" class="form-label">Mobile:</label>
                            <input type="text" id="mobile" name="mobile" class="form-control" placeholder="Enter mobile number" required>
                            <small class="form-text text-muted">Please enter your Mobile number</small>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="whatsapp_number" class="form-label">Whatsapp Number:</label>
                            <input type="text" id="whatsapp_number" name="whatsapp_number" class="form-control" placeholder="Enter WhatsApp number" required>
                            <small class="form-text text-muted">Please enter your WhatsApp number</small>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="Amount" class="form-label">Amount:</label>
                            <input type="number" id="Amount" name="amount" class="form-control" placeholder="Enter Your Amount" required>
                            <small class="form-text text-muted">Please enter your Amount</small>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="account_request_date">Account Request Date</label>
                                <input type="date" name="account_request_date" id="account_request_date" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="create_account_date">Create Account Date</label>
                                <input type="date" name="create_account_date" id="create_account_date" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="text-end mt-3">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
