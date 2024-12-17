@extends('layouts.app')
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Group Loan') }}
    </h2>
@endsection
@section('content')
<div class="container"> 
    <a class="mr-3 add-btn" href="{{ route('grouploans.create') }}">Add GroupLoan</a>
    <div class="table-title">Group Loan</div>
    <table>
        <thead>
            <tr>
                <th>Group Name</th>
                <th>Leader Name</th>
                <th>Leader Number</th>
                {{-- <th>Team Lead Name</th>
                <th>Team Lead Number</th>
                <th>Total Members</th> --}}
                <th>Loan Amount</th>
                <th>Interest Rate (%)</th>
                <th>Loan Type</th>
                <th>Collected Amount</th>
                <th>Duration</th>
                <th>Disbursement Rate (%)</th>               
                <th>Agent ID</th>               
            </tr>
        </thead>
        <tbody>
            @forelse ($groupLoans as $index => $groupLoan)
                <tr>
                    <td>{{ $groupLoan->group->group_name }}</td>
                    <td>{{ $groupLoan->leader_name }}</td>
                    <td>{{ $groupLoan->leader_number }}</td>
                    {{-- <td>{{ $groupLoan->teamlead_name }}</td>
                    <td>{{ $groupLoan->teamlead_number }}</td>
                    <td>{{ $groupLoan->totalgroup_member }}</td> --}}
                    <td>{{ $groupLoan->loan_amount }}</td>
                    <td>{{ $groupLoan->intrest_rate }}</td>
                    <td>{{ ucfirst($groupLoan->type) }}</td>
                    <td>{{ $groupLoan->collected_amount }}</td>
                    <td>{{ $groupLoan->duration }}</td>
                    <td>{{ $groupLoan->disburse_rate }}</td>                    
                    <td>{{ $groupLoan->agent_id }}</td>                   
                </tr>
            @empty
                <tr>
                    <td colspan="10" class="text-center">No Group Loans Found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
