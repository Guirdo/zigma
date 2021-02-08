@extends('layouts.app')

@section('content')

<div class="col">
    <h3>Full name</h3>
    <p>{{ $student->name.' '.$student->lastname }}</p>
</div>

<div class="row ml-0">
    <div class="col">
        <h3>Birthday</h3>
        <p>{{ $student->birthday }}</p>
    </div>
    <div class="col">
        <h3>Gender</h3>
        <p>{{ $student->gender }}</p>
    </div>
</div>

<div class="row ml-0">
    <div class="col">
        <h3>Email</h3>
        <p>{{ $student->email }}</p>
    </div>

    <div class="col">
        <h3>Phone number</h3>
        <p>{{ $student->phonenumber }}</p>
    </div>
</div>

<div class="col">
    <h3>Address</h3>
    <p>{{ $student->address }}</p>
</div>

<div class="row justify-content-around mt-4">
    <a class="btn btn-info col-md-3 ml-0 mr-0" href="{{ route('students.index') }}">Back</a>
    <a class="btn btn-warning col-md-3 ml-0 mr-0" href="{{ route('students.edit',$student->id) }}">Edit</a>
    <a class="btn btn-danger col-md-3 ml-0 mr-0" href="#" id="btnDelete">DELETE</a>
</div>

<div class="alert alert-info mt-3" id="alert-delete" role="alert">
    <h2 class="text-center">Are you sure about delete this student?</h2>
    <div class="row justify-content-around mt-3">
        <button class="btn btn-success col-md-4 m-0" id="btnCancel">Cancel</button>
        <button class="btn btn-danger col-md-4 m-0" id="btnConfirm">Confirm</button>
        <input type="hidden" value="{{ $student->id }}" id="student_id">
    </div>
</div>

    @section('scripts')
    <script src="{{ asset('js/students/delete.js') }}"></script>
    @endsection

@endsection