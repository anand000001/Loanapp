@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Edit Saving Ac') }}
    </h2>
@endsection

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h5>Edit Saving Ac</h5>
        </div>
        <div class="border-line"></div>
        <div class="card-body">
            
            <form method="POST" action="{{ route('savingacs.update', $savingac->id) }}">
                @csrf 
                @method('PUT') 

                <div class="row g-3">
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Enter full name" value="{{ old('name', $savingac->name) }}" required>
                            <small class="form-text text-muted">Please enter your full name</small>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Enter email" value="{{ old('email', $savingac->email) }}" required>
                            <small class="form-text text-muted">Please enter your email</small>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="mobile" class="form-label">Mobile:</label>
                            <input type="text" id="mobile" name="mobile" class="form-control" placeholder="Enter mobile number" value="{{ old('mobile', $savingac->mobile) }}" required>
                            <small class="form-text text-muted">Please enter your Mobile number</small>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="whatsapp_number" class="form-label">Whatsapp Number:</label>
                            <input type="text" id="whatsapp_number" name="whatsapp_number" class="form-control" placeholder="Enter WhatsApp number" value="{{ old('whatsapp_number', $savingac->whatsapp_number) }}">
                            <small class="form-text text-muted">Please enter your WhatsApp number</small>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="amount" class="form-label">Amount:</label>
                            <input type="number" id="amount" name="amount" class="form-control" placeholder="Enter Your Amount" value="{{ old('amount', $savingac->amount) }}" required>
                            <small class="form-text text-muted">Please enter your Amount</small>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="account_request_date" class="form-label">Account Request Date:</label>
                            <input type="date" name="account_request_date" id="account_request_date" class="form-control" value="{{ old('account_request_date', $savingac->account_request_date) }}" required>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="status" class="form-label">Status:</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="Pending" {{ $savingac->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="Approved" {{ $savingac->status == 'Approved' ? 'selected' : '' }}>Approved</option>
                                <option value="Rejected" {{ $savingac->status == 'Rejected' ? 'selected' : '' }}>Rejected</option>
                            </select>
                        </div>
                    </div>
                </div>

                
                <div class="text-end mt-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
