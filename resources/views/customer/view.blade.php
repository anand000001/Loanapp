@extends('layouts.app')
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Customers') }}
    </h2>
@endsection
@section('content')
{{-- <div class="container mt-4">
    <!-- Users Basic Details -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <h5>Users Basic Details</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <strong>Gender:</strong> <span class="text-muted">{{ $user->gender ?? 'NA' }}</span>
                </div>
                <div class="col-md-4 mb-3">
                    <strong>Marital Status:</strong> <span class="text-muted">{{ $user->marital_status ?? 'NA' }}</span>
                </div>
                <div class="col-md-4 mb-3">
                    <strong>Education:</strong> <span class="text-muted">{{ $user->education ?? 'NA' }}</span>
                </div>
                <div class="col-md-4 mb-3">
                    <strong>Job Status:</strong> <span class="text-muted">{{ $user->job_status ?? 'NA' }}</span>
                </div>
                <div class="col-md-4 mb-3">
                    <strong>Profession:</strong> <span class="text-muted">{{ $user->profession ?? 'NA' }}</span>
                </div>
                <div class="col-md-4 mb-3">
                    <strong>Income:</strong> <span class="text-muted">{{ $user->income ?? 'NA' }}</span>
                </div>
                <div class="col-md-4 mb-3">
                    <strong>Permanent Address:</strong> <span class="text-muted">{{ $user->permanent_address ?? 'NA' }}</span>
                </div>
                <div class="col-md-4 mb-3">
                    <strong>City:</strong> <span class="text-muted">{{ $user->city ?? 'NA' }}</span>
                </div>
                <div class="col-md-4 mb-3">
                    <strong>State:</strong> <span class="text-muted">{{ $user->state ?? 'NA' }}</span>
                </div>
                <div class="col-md-4 mb-3">
                    <strong>Current Address:</strong> <span class="text-muted">{{ $user->current_address ?? 'NA' }}</span>
                </div>
                <div class="col-md-4 mb-3">
                    <strong>City:</strong> <span class="text-muted">{{ $user->current_city ?? 'NA' }}</span>
                </div>
                <div class="col-md-4 mb-3">
                    <strong>State:</strong> <span class="text-muted">{{ $user->current_state ?? 'NA' }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- KYC & Bank Details -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <h5>KYC & Bank Details</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <strong>Date of Birth:</strong> <span class="text-muted">{{ $user->dob ?? 'NA' }}</span>
                </div>
                <div class="col-md-4 mb-3">
                    <strong>Pan Number:</strong> <span class="text-muted">{{ $user->pan_number ?? 'NA' }}</span>
                </div>
                <div class="col-md-4 mb-3">
                    <strong>Aadhaar Number:</strong> <span class="text-muted">{{ $user->aadhaar_number ?? 'NA' }}</span>
                </div>
                <div class="col-md-4 mb-3">
                    <strong>Bank Name:</strong> <span class="text-muted">{{ $user->bank_name ?? 'NA' }}</span>
                </div>
                <div class="col-md-4 mb-3">
                    <strong>Account Number:</strong> <span class="text-muted">{{ $user->account_number ?? 'NA' }}</span>
                </div>
                <div class="col-md-4 mb-3">
                    <strong>IFSC Code:</strong> <span class="text-muted">{{ $user->ifsc_code ?? 'NA' }}</span>
                </div>
                <div class="col-md-4 mb-3">
                    <strong>Branch Name:</strong> <span class="text-muted">{{ $user->branch_name ?? 'NA' }}</span>
                </div>
                <div class="col-md-4 mb-3">
                    <strong>City:</strong> <span class="text-muted">{{ $user->bank_city ?? 'NA' }}</span>
                </div>
                <div class="col-md-4 mb-3">
                    <strong>State:</strong> <span class="text-muted">{{ $user->bank_state ?? 'NA' }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Document Images -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <h5>Documents</h5>
        </div>
        <div class="card-body text-center">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <h6>Aadhaar Card Front</h6>
                    <img src="{{ $user->aadhaar_front_url ?? '#' }}" alt="Image Not Available" class="img-fluid">
                </div>
                <div class="col-md-4 mb-3">
                    <h6>Aadhaar Card Back</h6>
                    <img src="{{ $user->aadhaar_back_url ?? '#' }}" alt="Image Not Available" class="img-fluid">
                </div>
                <div class="col-md-4 mb-3">
                    <h6>Pan Card</h6>
                    <img src="{{ $user->pan_card_url ?? '#' }}" alt="Image Not Available" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="container mt-4">
    <!-- Users Basic Details -->
    <div class="card mb-4">
        <div class="card-header" style="background-color: #1f6691;color:aliceblue">
            <h6 style="color:aliceblue">Basic Details</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <strong>Gender:</strong> <span class="text-muted">{{ $customer->gender ?? 'NA' }}</span>
                </div>
                <div class="col-md-4 mb-3">
                    <strong>Marital Status:</strong> <span class="text-muted">{{ $customer->marital_status ?? 'NA' }}</span>
                </div>
                <div class="col-md-4 mb-3">
                    <strong>Education:</strong> <span class="text-muted">{{ $customer->education ?? 'NA' }}</span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <strong>Job Status:</strong> <span class="text-muted">{{ $customer->job_status ?? 'NA' }}</span>
                </div>
                <div class="col-md-4 mb-3">
                    <strong>Profession:</strong> <span class="text-muted">{{ $customer->profession ?? 'NA' }}</span>
                </div>
                <div class="col-md-4 mb-3">
                    <strong>Income:</strong> <span class="text-muted">{{ $customer->income ?? 'NA' }}</span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <strong>Permanent Address:</strong> <span class="text-muted">{{ $customer->permanent_address ?? 'NA' }}</span>
                </div>
                <div class="col-md-4 mb-3">
                    <strong>City:</strong> <span class="text-muted">{{ $customer->city ?? 'NA' }}</span>
                </div>
                <div class="col-md-4 mb-3">
                    <strong>State:</strong> <span class="text-muted">{{ $customer->state ?? 'NA' }}</span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <strong>Current Address:</strong> <span class="text-muted">{{ $customer->current_address ?? 'NA' }}</span>
                </div>
                <div class="col-md-4 mb-3">
                    <strong>City:</strong> <span class="text-muted">{{ $customer->current_city ?? 'NA' }}</span>
                </div>
                <div class="col-md-4 mb-3">
                    <strong>State:</strong> <span class="text-muted">{{ $customer->current_state ?? 'NA' }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- KYC & Bank Details -->
    <div class="card mb-4">
        <div class="card-header text-white" style="background-color: #1f6691;">
            <h6 style="color:aliceblue">KYC & Bank Details</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <strong>Date of Birth:</strong> <span class="text-muted">{{ $customer->dob ?? 'NA' }}</span>
                </div>
                <div class="col-md-4 mb-3">
                    <strong>Pan Number:</strong> <span class="text-muted">{{ $customer->pan_number ?? 'NA' }}</span>
                </div>
                <div class="col-md-4 mb-3">
                    <strong>Aadhaar Number:</strong> <span class="text-muted">{{ $customer->aadhaar_number ?? 'NA' }}</span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <strong>Bank Name:</strong> <span class="text-muted">{{ $customer->bank_name ?? 'NA' }}</span>
                </div>
                <div class="col-md-4 mb-3">
                    <strong>Account Number:</strong> <span class="text-muted">{{ $customer->account_number ?? 'NA' }}</span>
                </div>
                <div class="col-md-4 mb-3">
                    <strong>IFSC Code:</strong> <span class="text-muted">{{ $customer->ifsc_code ?? 'NA' }}</span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <strong>Branch Name:</strong> <span class="text-muted">{{ $customer->branch_name ?? 'NA' }}</span>
                </div>
                <div class="col-md-4 mb-3">
                    <strong>City:</strong> <span class="text-muted">{{ $customer->bank_city ?? 'NA' }}</span>
                </div>
                <div class="col-md-4 mb-3">
                    <strong>State:</strong> <span class="text-muted">{{ $customer->bank_state ?? 'NA' }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Document Images -->
    <div class="card mb-4">
        <div class="card-header text-white" style="background-color: #1f6691;">
            <h6 style="color:aliceblue">Documents</h6>
        </div>
        <div class="card-body text-center">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <h6>Aadhaar Card Front</h6>
                    <img src="{{ $customer->aadhaar_front_url ?? '#' }}" alt="Image Not Available" class="img-fluid">
                </div>
                <div class="col-md-4 mb-3">
                    <h6>Aadhaar Card Back</h6>
                    <img src="{{ $customer->aadhaar_back_url ?? '#' }}" alt="Image Not Available" class="img-fluid">
                </div>
                <div class="col-md-4 mb-3">
                    <h6>Pan Card</h6>
                    <img src="{{ $customer->pan_card_url ?? '#' }}" alt="Image Not Available" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
