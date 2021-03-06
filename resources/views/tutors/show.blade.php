@extends('layouts.app')

@section('content')

<div class="col">
    <h3>Full name</h3>
    <p>{{ $tutor->name.' '.$tutor->lastname }}</p>
</div>

<div class="row ml-0">
    <div class="col">
        <h3>Email</h3>
        <p>{{ $tutor->email }}</p>
    </div>
    <div class="col">
        <h3>Gender</h3>
        <p>{{ $tutor->gender }}</p>
    </div>
</div>

<div class="col">
    <h3>Phone number</h3>
    <p>{{ $tutor->phonenumber }}</p>
</div>

<div class="col">
    <h3>Address</h3>
    <p>{{ $tutor->address }}</p>
</div>

@if($student != null)
<div class="col">
    <h3>Student</h3>
    <p><a href="{{ route('students.show',$student->id) }}">{{ $student->name.' '.$student->lastname }}</a></p>
</div>
@endif

<div class="row justify-content-around mt-4">
    <a class="btn btn-info col-md-3 ml-0 mr-0" href="{{ route('tutors.index') }}">Back</a>
    <a class="btn btn-warning col-md-3 ml-0 mr-0" href="{{ route('tutors.edit',$tutor->id) }}">Edit</a>
    <a class="btn btn-danger col-md-3 ml-0 mr-0" href="#" id="btnDelete">DELETE</a>
</div>

<div class="alert alert-info mt-3" id="alert-delete" role="alert">
    <h2 class="text-center">Are you sure about delete this tutor?</h2>
    <div class="row justify-content-around mt-3">
        <button class="btn btn-success col-md-4 m-0" id="btnCancel">Cancel</button>
        <button class="btn btn-danger col-md-4 m-0" id="btnConfirm">Confirm</button>
        <input type="hidden" value="{{ $tutor->id }}" id="item_id">
        <input type="hidden" value="tutors" id="item_type">
    </div>
</div>

    @section('scripts')
    <script src="{{ asset('js/main/delete.js') }}"></script>
    @endsection

@endsection