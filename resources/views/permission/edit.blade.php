@extends('layouts.app')
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Create Permission') }}
    </h2>
@endsection
@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h5>Permisson Create</h5>
        </div>
        <div class="border-line"></div>
        <div class="card-body">
            <form action="{{ route('permission.update', $permission->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row g-3">
                    <!-- Row 1 -->
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" value="{{old('name',$permission->name)}}" id="name" name="name" class="form-control" placeholder="Enter full name">
                        </div>
                    </div>
                   
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
    
@endsection