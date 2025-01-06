@extends('layouts.app')
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Role') }}
    </h2>
@endsection
@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h5>Edit Role</h5>
        </div>
        <div class="border-line"></div>
        <div class="card-body">
            <form action="{{ route('role.update', $role->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row g-3">
                    <!-- Row 1 -->
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" value="{{old('name',$role->name)}}" id="name" name="name" class="form-control" placeholder="Enter full name">
                        </div>
                    </div>

                    <div class="col-lg-9">
                        @if($permissions->isNotEmpty())
                            @foreach($permissions as $permission)
                                <div class="mt-3">
                                    <input {{($hasPermissions->contains($permission->name)) ? 'checked':''}} type="checkbox" class="rounded" id="permission-{{$permission->id}}" name="permission[]" value="{{$permission->name}}">
                                    <label for="permission-{{$permission->id}}">{{$permission->name}}"</label>
                                </div>
                            @endforeach
                        @endif 
                    </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
    
@endsection