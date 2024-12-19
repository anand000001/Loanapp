@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Create EMI Record') }}
    </h2>
@endsection

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h5>Create a New EMI</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('emis.store') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="mobile" class="form-label">Mobile</label>
                            <input type="text" name="mobile" id="mobile" class="form-control @error('mobile') is-invalid @enderror" value="{{ old('mobile') }}">
                            @error('mobile')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="loan_amount" class="form-label">Loan Amount</label>
                            <input type="number" name="loan_amount" id="loan_amount" class="form-control @error('loan_amount') is-invalid @enderror" value="{{ old('loan_amount') }}">
                            @error('loan_amount')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <label for="collection_type" class="form-label">Collection Type</label>
                        <div class="mb-3">
                           
                            <select name="collection_type" id="collection_type" class="form-select form-control @error('collection_type') is-invalid @enderror">
                                <option value="daily" {{ old('collection_type') == 'daily' ? 'selected' : '' }}>Daily</option>
                                <option value="weekly" {{ old('collection_type') == 'weekly' ? 'selected' : '' }}>Weekly</option>
                                <option value="monthly" {{ old('collection_type') == 'monthly' ? 'selected' : '' }}>Monthly</option>
                            </select>
                            @error('collection_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="date_of_collect" class="form-label">Date of Collection</label>
                            <input type="date" name="date_of_collect" id="date_of_collect" class="form-control @error('date_of_collect') is-invalid @enderror" value="{{ old('date_of_collect') }}">
                            @error('date_of_collect')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="emi_number" class="form-label">EMI Number</label>
                            <input type="number" name="emi_number" id="emi_number" class="form-control @error('emi_number') is-invalid @enderror" value="{{ old('emi_number') }}">
                            @error('emi_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="emi_amount" class="form-label">EMI Amount</label>
                            <input type="number" name="emi_amount" id="emi_amount" class="form-control @error('emi_amount') is-invalid @enderror" value="{{ old('emi_amount') }}">
                            @error('emi_amount')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="paid_emi_amount" class="form-label">Paid EMI Amount</label>
                            <input type="number" name="paid_emi_amount" id="paid_emi_amount" class="form-control @error('paid_emi_amount') is-invalid @enderror" value="{{ old('paid_emi_amount') }}">
                            @error('paid_emi_amount')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="remaining_amount" class="form-label">Remaining Amount</label>
                            <input type="number" name="remaining_amount" id="remaining_amount" class="form-control @error('remaining_amount') is-invalid @enderror" value="{{ old('remaining_amount') }}">
                            @error('remaining_amount')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-select form-control @error('status') is-invalid @enderror">
                                <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div> --}}
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Create EMI</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
