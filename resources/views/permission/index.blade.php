@extends('layouts.app')
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Permissions') }}
    </h2>
@endsection
@section('content')
<div class="container">
    {{-- <button class="add-btn">+ Add Customer</button> --}}
    <a class="mr-3 add-btn" href="{{route('permission.create')}}">Add Permission
    </a>
    <div class="table-title">Create Permission</div>
    <table>
        <thead>
            <tr>
                <th>S.NO</th>
                <th>NAME</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
           
            @foreach($permissions as $index => $data)
            <tr>
                <td>{{$index+1}}</td>
                <td>{{$data->name}}</td>
                
                
                <td>
                    {{-- <div class="action-buttons">
                        <button class="edit">Edit</button>
                        <button class="delete">Delete</button>
                    </div> --}}
                    <div class="flex space-x-2 items-center action-buttons">
                        
                        <a class="btn btn-success" href="{{ route('permission.edit', $data->id) }}" class="text-green-500 hover:text-blue-700" aria-label="View">
                           Edit 
                        </a>
                        <form action="{{ route('permission.destroy', $data->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this permission?');">
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