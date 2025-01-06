@extends('layouts.app')
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Users') }}
    </h2>
@endsection
@section('content')
<div class="container">
    {{-- <button class="add-btn">+ Add Customer</button> --}}
    <a class="mr-3 add-btn" href="{{route('user.create')}}">Add Roles
    </a>
    <div class="table-title">User</div>
    <table>
        <thead>
            <tr>
                <th>S.NO</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>ROLES</th>
                <th>CREATED AT</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
           
            @foreach($users as $index => $data)
            <tr>
                <td>{{$index+1}}</td>
                <td>{{$data->name}}</td>
                <td>{{$data->email}}</td>
                <td>{{$data->roles->pluck('name')->implode(',')}}</td>
                <td>{{\Carbon\Carbon::parse($data->created_at)->format('d M,Y',)}}</td>
                
                <td>
                    <div class="flex space-x-2 items-center action-buttons">
                        
                        <a class="btn btn-success" href="{{ route('user.edit', $data->id) }}" class="text-green-500 hover:text-blue-700" aria-label="View">
                           Edit 
                        </a>
                        <form action="{{ route('user.destroy', $data->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this role?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" aria-label="Delete">
                                Delete
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
    
@endsection