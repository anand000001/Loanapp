
@extends('layouts.app')
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Create Customer') }}
    </h2>
@endsection
@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <!-- Left-aligned text -->
        <div class="table-title">Customer</div>
        <!-- Right-aligned button -->
        <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#addLoanModal">
            + Add Loan
        </button>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>CUSTOMER ID</th>
                <th>AGENT ID</th>
                <th>LOAN AMOUNT</th>
                <th>INTREST RATE</th>
                <th>TYPE</th>
                <th>COLLECTED AMOUNT</th>
                <th>DURATION</th>
                <th>DISBURSE DATE</th>
                {{-- <th>ACTION</th> --}}
            </tr>
        </thead>
        <tbody>
            @forelse($loans as $loan)
                        <tr>
                            <td>{{ $loan->id }}</td>
                            <td>{{ $loan->customer_id }}</td>
                            <td>{{ $loan->agent_id }}</td>
                            <td>${{ number_format($loan->loan_amount, 2) }}</td>
                            <td>{{ $loan->interest_rate }}%</td>
                            <td>{{ $loan->type }}</td>
                            <td>{{ $loan->collected_amount }}</td>
                            <td>{{ $loan->duration }}</td>
                            <td>{{ $loan->disburse_date }}</td>
                            {{-- <td>
                                <!-- Action buttons -->
                                <div class="d-flex gap-2">
                                    <a href="#" class="btn btn-info btn-sm" title="View">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#editLoanModal" class="btn btn-warning btn-sm" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                        <form action="{{route('personalloans.edit',$loan->id)}}">
                                    </button>
                                    <form action="{{ route('personalloans.destroy', $loan->id) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')" title="Delete">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td> --}}
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No loans found.</td>
                        </tr>
                    @endforelse
        </tbody>
    </table>
</div>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>




        <!-- Modal Structure -->
        <div class="modal fade" id="addLoanModal" tabindex="-1" aria-labelledby="addLoanModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addLoanModalLabel">Add Loan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Form to create a new loan -->
                        <form action="{{ route('personalloans.store') }}" method="POST">
                            @csrf
    
                            <!-- Customer and Agent Dropdowns -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="customer_id" class="form-label">Customer List</label>
                                    <select name="customer_id" id="customer_id" class="form-select">
                                        <option value="" selected>Select your Customer</option>
                                        <option value="1">Customer 1</option>
                                        <option value="2">Customer 2</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="agent_id" class="form-label">Agent List</label>
                                    <select name="agent_id" id="agent_id" class="form-select">
                                        <option value="" selected>Select your Agent</option>
                                        <option value="1">Agent 1</option>
                                        <option value="2">Agent 2</option>
                                    </select>
                                </div>
                            </div>
    
                            <!-- Loan Amount and Interest Rate -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="loan_amount" class="form-label">Loan Amount</label>
                                    <input type="number" name="loan_amount" id="loan_amount" class="form-control" placeholder="Enter Loan Amount">
                                </div>
                                <div class="col-md-6">
                                    <label for="interest_rate" class="form-label">Interest Rate</label>
                                    <input type="number" name="interest_rate" id="interest_rate" class="form-control" placeholder="Rate" step="0.01">
                                </div>
                            </div>
    
                            <!-- Type and Collected Amount -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="type" class="form-label">Type</label>
                                    <select name="type" id="type" class="form-select">
                                        <option value="" selected>Select Type</option>
                                        <option value="Weekly">Weekly</option>
                                        <option value="Monthly">Monthly</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="collected_amount" class="form-label">Collected Amount</label>
                                    <input type="number" name="collected_amount" id="collected_amount" class="form-control" placeholder="Collected Amount">
                                </div>
                            </div>
    
                            <!-- Duration and Disburse Date -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="duration" class="form-label">Duration (Months)</label>
                                    <input type="number" name="duration" id="duration" class="form-control" placeholder="Enter Duration">
                                </div>
                                <div class="col-md-6">
                                    <label for="disburse_date" class="form-label">Disburse Date</label>
                                    <input type="date" name="disburse_date" id="disburse_date" class="form-control">
                                </div>
                            </div>
    
                            <!-- Submit Button -->
                            <div class="text-left">
                                <button type="submit" class="btn btn-warning btn-lg">
                                    Add Loan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        <div class="modal fade" id="editLoanModal" tabindex="-1" aria-labelledby="editLoanModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editLoanModalLabel">Edit Loan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Form to edit an existing loan -->
                        <form action="{{ route('personalloans.update', $loan->id) }}" method="POST">
                            @csrf
                            @method('PUT')
        
                            <!-- Customer and Agent Dropdowns -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="customer_id" class="form-label">Customer List</label>
                                    <select name="customer_id" id="customer_id" class="form-select">
                                        <option value="" disabled>Select your Customer</option>
                                        <option value="1" {{ $loan->customer_id == 1 ? 'selected' : '' }}>Customer 1</option>
                                        <option value="2" {{ $loan->customer_id == 2 ? 'selected' : '' }}>Customer 2</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="agent_id" class="form-label">Agent List</label>
                                    <select name="agent_id" id="agent_id" class="form-select">
                                        <option value="" disabled>Select your Agent</option>
                                        <option value="1" {{ $loan->agent_id == 1 ? 'selected' : '' }}>Agent 1</option>
                                        <option value="2" {{ $loan->agent_id == 2 ? 'selected' : '' }}>Agent 2</option>
                                    </select>
                                </div>
                            </div>
        
                            <!-- Loan Amount and Interest Rate -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="loan_amount" class="form-label">Loan Amount</label>
                                    <input type="number" name="loan_amount" id="loan_amount" class="form-control" placeholder="Enter Loan Amount" value="{{ $loan->loan_amount }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="interest_rate" class="form-label">Interest Rate</label>
                                    <input type="number" name="interest_rate" id="interest_rate" class="form-control" placeholder="Rate" step="0.01" value="{{ $loan->interest_rate }}">
                                </div>
                            </div>
        
                            <!-- Type and Collected Amount -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="type" class="form-label">Type</label>
                                    <select name="type" id="type" class="form-select">
                                        <option value="" disabled>Select Type</option>
                                        <option value="Weekly" {{ $loan->type == 'Weekly' ? 'selected' : '' }}>Weekly</option>
                                        <option value="Monthly" {{ $loan->type == 'Monthly' ? 'selected' : '' }}>Monthly</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="collected_amount" class="form-label">Collected Amount</label>
                                    <input type="number" name="collected_amount" id="collected_amount" class="form-control" placeholder="Collected Amount" value="{{ $loan->collected_amount }}">
                                </div>
                            </div>
        
                            <!-- Duration and Disburse Date -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="duration" class="form-label">Duration (Months)</label>
                                    <input type="number" name="duration" id="duration" class="form-control" placeholder="Enter Duration" value="{{ $loan->duration }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="disburse_date" class="form-label">Disburse Date</label>
                                    <input type="date" name="disburse_date" id="disburse_date" class="form-control" value="{{ $loan->disburse_date }}">
                                </div>
                            </div>
        
                            <!-- Submit Button -->
                            <div class="text-left">
                                <button type="submit" class="btn btn-success btn-lg">
                                    Update Loan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        


<!-- Bootstrap CSS and JS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection

    