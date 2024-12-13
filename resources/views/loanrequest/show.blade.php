<x-guest-layout>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2>Loan Request Details</h2>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <p><strong>ID:</strong> {{ $loanRequest->id }}</p>
                        <p><strong>Loan Amount:</strong> ${{ $loanRequest->loan_amount }}</p>
                        <p><strong>Loan Duration:</strong> {{ $loanRequest->loan_duration }} months</p>
                        <p><strong>Guarantor:</strong> {{ $loanRequest->guarantor }}</p>
                        <p><strong>Guarantor Contacts:</strong> {{ $loanRequest->guarantor_contacts }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Request Date:</strong> {{ $loanRequest->loan_requestdate }}</p>
                        <p><strong>Status:</strong> 
                            <span class="badge bg-info">{{ ucfirst($loanRequest->loan_status) }}</span>
                        </p>
                        <p><strong>Salary Slips:</strong>
                            <a href="{{ asset('storage/' . $loanRequest->salary_slip1) }}" class="btn btn-link">Slip 1</a>
                            <a href="{{ asset('storage/' . $loanRequest->salary_slip2) }}" class="btn btn-link">Slip 2</a>
                            <a href="{{ asset('storage/' . $loanRequest->salary_slip3) }}" class="btn btn-link">Slip 3</a>
                        </p>
                        <p><strong>Cheque:</strong> 
                            <a href="{{ asset('storage/' . $loanRequest->cheque) }}" class="btn btn-link">View Cheque</a>
                        </p>
                        <p><strong>Bank Statement:</strong> 
                            <a href="{{ asset('storage/' . $loanRequest->bank_statement) }}" class="btn btn-link">View Bank Statement</a>
                        </p>
                    </div>
                </div>
                <a href="{{ route('loanrequest.index') }}" class="btn btn-primary">Back to Loan Requests</a>
            </div>
        </div>
    </div>
</x-guest-layout>
