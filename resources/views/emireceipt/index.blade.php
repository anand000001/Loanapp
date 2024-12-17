@extends('layouts.app')
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('EMI Receipt') }}
    </h2>
@endsection

@section('content')
<div class="container">
    
    <div class="d-flex justify-content-end mb-3">
        <a class="mr-3 add-btn" href="{{route('emireceipts.create')}}"> Create New EMI Receipt</a>
    </div>
    
    <div class="table-title"> EMI Receipt</div>

    <table class="table table-striped mt-3 align-middle">
        <thead>
            <tr class="text-center">
                <th>ID</th>
                <th>Name</th>
                <th>Mobile Number</th>
                <th>EMI Amount</th>
                <th>Loan Amount</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($emireceipts as $receipt)
            <tr>
                <td>{{ $receipt->id }}</td>
                <td>{{ $receipt->name }}</td>
                <td>{{ $receipt->mobile_number }}</td>
                <td>{{ $receipt->emi_amount }}</td>
                <td>{{ $receipt->loan_amount }}</td>
                <td>{{ $receipt->status }}</td>
                <td>
                    {{-- <a href="{{ route('emireceipts.show', $receipt->id) }}" class="btn btn-info btn-sm">View</a> --}}
                    <a href="{{ route('emireceipts.edit', $receipt->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('emireceipts.destroy', $receipt->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        {{-- <button type="submit" class="btn btn-danger btn-sm">Delete</button> --}}
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
