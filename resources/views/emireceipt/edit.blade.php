@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h2>Edit EMI Receipt</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('emireceipts.update', $emireceipt->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="row mb-3">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" name="name" class="form-control" value="{{ $emireceipt->name }}" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="mobile_number" class="form-label">Mobile Number:</label>
                            <input type="text" name="mobile_number" class="form-control" value="{{ $emireceipt->mobile_number }}" required>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="whatsapp_number" class="form-label">WhatsApp Number:</label>
                            <input type="text" name="whatsapp_number" class="form-control" value="{{ $emireceipt->whatsapp_number }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="address" class="form-label">Address:</label>
                            <textarea name="address" class="form-control" required>{{ $emireceipt->address }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="emi_amount" class="form-label">EMI Amount:</label>
                            <input type="number" name="emi_amount" class="form-control" value="{{ $emireceipt->emi_amount }}" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="loan_amount" class="form-label">Loan Amount:</label>
                            <input type="number" name="loan_amount" class="form-control" value="{{ $emireceipt->loan_amount }}" required>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="date_of_collect" class="form-label">Date of Collect:</label>
                            <input type="date" name="date_of_collect" class="form-control" value="{{ $emireceipt->date_of_collect }}" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="last_date_collect" class="form-label">Last Date of Collect:</label>
                            <input type="date" name="last_date_collect" class="form-control" value="{{ $emireceipt->last_date_collect }}" required>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="payment_slip" class="form-label">Payment Slip (optional):</label>
                            <input type="file" name="payment_slip" class="form-control">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn" style="background-color: #1f6691; color: white; float: right ;">Save Changes</button>
                {{-- <button type="submit" class="btn btn-success">Save Changes</button> --}}
            </form>
        </div>
    </div>
</div>
@endsection
