@extends('layouts.app')
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Customers') }}
    </h2>
@endsection
@section('content')
<div class="container">
   <a class="mr-3 add-btn" href="{{route('customer.create')}}">Add Customer
    </a>
    <div class="table-title">Customer</div>
    <table>
        <thead>
            <tr>
                <th>S.NO</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>MOBILE</th>
                <th>WHATSAPP NUMBER</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $index => $data)
            <tr>
                <td>{{$index+1}}</td>
                <td>{{$data->name}}</td>
                <td>{{$data->email}}</td>
                <td>{{$data->phone}}</td>
                <td>{{$data->whatsapp_number}}</td>
                
                <td>
                    
                    <div class="flex space-x-2 items-center action-buttons">
                        <a href="{{ route('customer.show', $data->id) }}" class="text-green-500 hover:text-blue-700" aria-label="View">
                            <i class="fas fa-eye fa-sm"></i>
                        </a>
                        
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
    
@endsection