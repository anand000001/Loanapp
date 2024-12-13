{{-- <x-guest-layout> --}}
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2>Edit Loan Request</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('loanrequest.update', $loanRequest->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="loan_amount" class="form-label">Loan Amount:</label>
                            <input type="number" name="loan_amount" class="form-control" value="{{ $loanRequest->loan_amount }}" required>
                        </div>

                        <div class="col-md-6">
                            <label for="loan_duration" class="form-label">Loan Duration (months):</label>
                            <input type="number" name="loan_duration" class="form-control" value="{{ $loanRequest->loan_duration }}" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="guarantor" class="form-label">Guarantor Name:</label>
                            <input type="text" name="guarantor" class="form-control" value="{{ $loanRequest->guarantor }}" required>
                        </div>

                        <div class="col-md-6">
                            <label for="guarantor_contacts" class="form-label">Guarantor Contacts:</label>
                            <input type="text" name="guarantor_contacts" class="form-control" value="{{ $loanRequest->guarantor_contacts }}" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="loan_requestdate" class="form-label">Loan Request Date:</label>
                            <input type="date" name="loan_requestdate" class="form-control" value="{{ $loanRequest->loan_requestdate }}" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ route('loanrequest.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
