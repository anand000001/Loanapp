@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __(' EMI Receipt') }}
    </h2>
@endsection

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h5>Create New EMI Receipt</h5>
        </div>
        <div class="border-line"></div>
        <div class="card-body">

            <form action="{{ route('emireceipts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-3">
                    
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="name">Name:</label>
                            <input type="text" name="name" class="form-control" required placeholder="Enter your name ">
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="mobile_number">Mobile Number:</label>
                            <input type="text" name="mobile_number" class="form-control" required placeholder="Enter your Mobile number">
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="whatsapp_number">WhatsApp Number:</label>
                            <input type="text" name="whatsapp_number" class="form-control"placeholder="Enter your WhatsApp number">
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="address">Address:</label>
                            <textarea name="address" class="form-control" required placeholder="Enter your Address"></textarea>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="emi_amount">EMI Amount:</label>
                            <input type="number" name="emi_amount" class="form-control" required placeholder="Enter EMI Amount">
                        </div>
                    </div>

                    
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="payment_slip">Payment Slip (optional):</label>
                            <input type="file" name="payment_slip" class="form-control"accept="image/*" style="border: 1px solid #292929; border-radius: 9px; padding:4px;">
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="paid_emi_amount">Paid Emi Amount :</label>
                            <input type="number" name="paid_emi_amount" class="form-control" required placeholder="Enter Paid Emi amount">
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="loan_amount">Loan Amount:</label>
                            <input type="number" name="loan_amount" class="form-control" required placeholder="Enter Loan amount">
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="date_of_collect">Date of Collect:</label>
                            <input type="date" name="date_of_collect" class="form-control" required placeholder="Enter Date of Collect">
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="last_date_collect">Last Date of Collect:</label>
                            <input type="date" name="last_date_collect" class="form-control" required placeholder="Last Date of Collect">
                        </div>
                    </div>

                </div>

              <button type="submit" class="btn" style="background-color: #1f6691; color: white; float: right ;">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
