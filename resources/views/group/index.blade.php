@extends('layouts.app')
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Group') }}
    </h2>
@endsection
@section('content')
<div class="container"> 
    {{-- <a class="mr-3 add-btn" href="{{ route('grouploans.create') }}">Add Group</a> --}}
    <div class="table-title">Group</div>
    <table>
        <thead>
            <tr>
                <th>S.No</th>
                <th>Group Name</th>
                <th>Group Leader Name</th>
                <th>Group Leader Number</th>           
            </tr>
        </thead>
        <tbody>
            @forelse ($groups as $group)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $group->group_name }}</td>
                    <td>{{ $group->group_leadername }}</td>
                    <td>{{ $group->group_leadernumber }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No Group Loans Found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
