
@extends('layouts.app')
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{-- {{ __('Create Customer') }} --}}
    </h2>
@endsection
@section('content')
<div class="container">
    <a href="{{ route('cities.create') }}" class="add-btn">+ Add City</a>
    <div class="table-title">CITY LIST</div>
    <table>
        <thead>
            <tr>
                <th>S.NO</th>
                <th>CITY NAME</th>
                <th>CITY CODE</th>
                <th>ACTION</th>
            </tr>
        </thead>
    <tbody>
        @foreach($cities as $city)
        <tr>
            <td>{{ $city->id }}</td>
            <td>{{ $city->city_name }}</td>
            <td>{{ $city->city_code }}</td>
            <td>
                <a href="{{ route('cities.edit', $city->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('cities.destroy', $city->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this city?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>

    </table>
</div>
    
@endsection