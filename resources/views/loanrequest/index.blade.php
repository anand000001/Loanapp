@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('loanrequest.create') }}" class="btn btn-primary">+ Create New Loan Request</a>
    <div class="table-title">Loan Requests</div>

    <table class="table table-striped mt-3 align-middle">
        <thead>
            <tr class="text-center">
                <th>ID</th>
                <th>Loan Amount</th>
                <th>Duration (Months)</th>
                <th>Guarantor</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($loanrequest as $loan)
                <tr class="text-center">
                    <td>{{ $loan->id }}</td>
                    <td>{{ $loan->loan_amount }}</td>
                    <td>{{ $loan->loan_duration }}</td>
                    <td>{{ $loan->guarantor }}</td>
                    <td>{{ $loan->loan_status }}</td>
                    <td>

                         <div class="btn-group" role="group">
                           <button type="submit" name="loan_status" value="approved" class="btn btn-success">Accepted </button>

                           <button type="submit" name="loan_status" value="not approved" class="btn btn-danger">Rejected </button>
                         </div>
                  </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection