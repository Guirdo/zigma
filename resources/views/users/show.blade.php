@extends('layouts.app')

@section('content')

<div class="row ml-0">
    <div class="col">
        <h3>Name</h3>
        <p>{{ $user->name }}</p>
    </div>
    <div class="col">
        <a class="btn btn-info col-md-5 ml-0 mr-0" href="{{ route('users.index') }}">Back</a>
    </div>
</div>

<div class="row ml-0">
    <div class="col-6">
        <h3>Email</h3>
        <p>{{ $user->email }}</p>
    </div>
    <div class="col">
        <a class="btn btn-warning col-md-5 ml-0 mr-0" href="{{ route('users.edit',$user->id) }}">Edit</a>
    </div>
</div>

<div class="row ml-0">
    <div class="col">
        <h3>User type</h3>
        <p>{{ $usertype->usertype }}</p>
    </div>
    <div class="col">
        <a class="btn btn-danger col-md-5 ml-0 mr-0" href="#" id="btnDelete">DELETE</a>
    </div>
</div>

<div class="col">
    <h3>Employee</h3>
    <p><a href="{{ route('employees.show',$user->employee_id) }}">{{ $employee->name.' '.$employee->lastname }}</a></p>
</div>

    <div class="alert alert-info" id="alert-delete" role="alert">
        <h2 class="text-center">Are you sure about delete this user?</h2>
        <div class="row justify-content-around mt-3">
            <button class="btn btn-success col-md-4 m-0" id="btnCancel">Cancel</button>
            <button class="btn btn-danger col-md-4 m-0" id="btnConfirm">Confirm</button>
            <input type="hidden" value="{{ $user->id }}" id="item_id">
            <input type="hidden" value="users" id="item_type">
        </div>
    </div>

    @section('scripts')
    <script src="{{ asset('js/main/delete.js') }}"></script>
    @endsection

@endsection