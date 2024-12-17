@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Saving Accounts') }}
    </h2>
@endsection

@section('content')
<div class="container">
    <button class="add-btn" onclick="window.location.href='{{ route('savingacs.create') }}'">+ Add Saving Account</button>

    <div class="table-title">Saving Accounts</div>
    <table>
        <thead>
            <tr>
                <th>S.NO</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>MOBILE</th>
                <th>AMOUNT</th>
                <th>STATUS</th>
                <th>ACCOUNT REQUEST DATE</th>
                <th>CREATE ACCOUNT DATE</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach($userAccounts as $savingac)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $savingac->name }}</td>
                <td>{{ $savingac->email }}</td>
                <td>{{ $savingac->mobile }}</td>
                <td>{{ $savingac->amount }}</td>
                <td>{{ $savingac->status }}</td>
                <td>{{ $savingac->account_request_date }}</td>
                <td>{{ $savingac->create_account_date }}</td>
                <td>
                    <div class="action-buttons">
                        <button class="edit" onclick="window.location.href='{{ route('savingacs.edit', $savingac->id) }}'">Edit</button>
                        <form action="{{ route('savingacs.destroy', $savingac->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
