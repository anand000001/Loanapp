@extends('layouts.app')

@section('content')
<div class="container">
    <h2>EMI Receipt Details</h2>

    <table class="table">
        <tr>
            <th>ID:</th>
            <td>{{ $emireceipt->id }}</td>
        </tr>
        <tr>
            <th>Name:</th>
            <td>{{ $emireceipt->name }}</td>
        </tr>
        <tr>
            <th>Mobile Number:</th>
            <td>{{ $emireceipt->mobile_number }}</td>
        </tr>
        <tr>
            <th>WhatsApp Number:</th>
            <td>{{ $emireceipt->whatsapp_number }}</td>
        </tr>
        <tr>
            <th>Address:</th>
            <td>{{ $emireceipt->address }}</td>
        </tr>
        <tr>
            <th>EMI Amount:</th>
            <td>{{ $emireceipt->emi_amount }}</td>
        </tr>
        <tr>
            <th>Loan Amount:</th>
            <td>{{ $emireceipt->loan_amount }}</td>
        </tr>
        <tr>
            <th>Date of Collect:</th>
            <td>{{ $emireceipt->date_of_collect }}</td>
        </tr>
        <tr>
            <th>Last Date of Collect:</th>
            <td>{{ $emireceipt->last_date_collect }}</td>
        </tr>
        <tr>
            <th>Status:</th>
            <td>{{ $emireceipt->status }}</td>
        </tr>
    </table>
    
    <a href="{{ route('emireceipts.index') }}" class="btn btn-secondary">Back to List</a>
</div>
@endsection
