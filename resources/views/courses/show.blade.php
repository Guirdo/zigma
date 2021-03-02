@extends('layouts.app')

@section('content')

<div class="col">
    <h3>Name</h3>
    <p>{{ $course->course }}</p>
</div>

<div class="row ml-0 mr-0">
    <div class="col">
        <h3>Monthly cost</h3>
        <p>${{ $course->monthlycost }}</p>
    </div>

    <div class="col">
        <h3>Weekly cost</h3>
        <p>${{ $course->weeklycost }}</p>
    </div>
</div>

<div class="row justify-content-between mt-4 ml-3 mr-3">
    <a class="btn btn-info col-md-3 ml-0 mr-0" href="{{ route('courses.index') }}">Back</a>
    <a class="btn btn-warning col-md-3 ml-0 mr-0" href="{{ route('courses.edit',$course->id) }}">Edit</a>
    <a class="btn btn-danger col-md-3 ml-0 mr-0" href="#" id="btnDelete">DELETE</a>
</div>

<div class="alert alert-info mt-3" id="alert-delete" role="alert">
    <h2 class="text-center">Are you sure about delete this course?</h2>
    <div class="row justify-content-between mt-3">
        <button class="btn btn-success col-md-4 m-0" id="btnCancel">Cancel</button>
        <button class="btn btn-danger col-md-4 m-0" id="btnConfirm">Confirm</button>
        <input type="hidden" value="{{ $course->id }}" id="item_id">
        <input type="hidden" value="courses" id="item_type">
    </div>
</div>

    @section('scripts')
    <script src="{{ asset('js/main/delete.js') }}"></script>
    @endsection

@endsection