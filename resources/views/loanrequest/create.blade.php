@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Create Loan Request') }}
    </h2>
@endsection

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h5>Create Loan Request</h5>
        </div>
        <div class="border-line"></div>
        <div class="card-body">
            <form action="{{ route('loanrequest.store') }}" method="POST" enctype="multipart/form-data">
                @csrf 
                <div class="row g-3">
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="loan_amount">Loan Amount:</label>
                            <input type="number" name="loan_amount" class="form-control" required placeholder="Enter loan amount">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="loan_duration">Loan Duration (months)</label>
                            <input type="number" name="loan_duration" class="form-control" required placeholder="Enter duration in months">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="guarantor">Guarantor Name:</label>
                            <input type="text" name="guarantor" class="form-control" required placeholder="Enter guarantor's name">
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="guarantor_contacts">Guarantor Contacts:</label>
                            <input type="text" name="guarantor_contacts" class="form-control" required placeholder="Enter guarantor's contact info">                        
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="salary_slip1">Salary Slip1:</label>
                            <input type="file" name="salary_slip1" class="form-control" accept="image/*" style="border: 1px solid #292929; border-radius: 9px; padding:4px;">
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="salary_slip2">Salary Slip2:</label>
                            <input type="file" name="salary_slip2" class="form-control" accept="image/*" style="border: 1px solid #292929; border-radius: 9px; padding:4px;">
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="salary_slip3">Salary Slip3:</label>
                            <input type="file" name="salary_slip3" class="form-control" accept="image/*" style="border: 1px solid #292929; border-radius: 9px; padding:4px;">
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="cheque">Cheque Image:</label>
                            <input type="file" name="cheque" class="form-control" accept="image/*" style="border: 1px solid #292929; border-radius: 9px; padding:4px;">
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="bank_statement">Bank Statement:</label>
                            <input type="file" name="bank_statement" class="form-control" accept="image/*" style="border: 1px solid #292929; border-radius: 9px; padding:4px;">
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="live_video">Live Video:</label>
                            <input type="file" name="live_video" class="form-control" accept="image/*" style="border: 1px solid #292929; border-radius: 9px; padding:4px;">
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="loan_requestdate">Loan Request Date:</label>
                            <input type="date" name="loan_requestdate" class="form-control" required>                   
                        </div>
                    </div>

                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
