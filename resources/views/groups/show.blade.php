@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/scroll_table.css') }}">
@endsection

@section('content')

<div class="row justify-content-between ml-0 mr-0">
    <div class="col">
        <h3>Schedule</h3>
        <p>{{ $group->getSchedule() }}</p>
    </div>

    <div class="col">
        <h3>Course</h3>
        <p>{{ $course->course }}</p>
    </div>
</div>

<div class="col">
    <h3>Teacher</h3>
    <p><a href="{{ route('employees.show',$teacher->id) }}">{{ $teacher->name.' '.$teacher->lastname }}</a></p>
</div>

<div class="col">
    <h3>Students</h3>
</div>
<div class="my-custom-scrollbar table-wrapper-scroll-y col ml-0 mr-0">
    <table class="table table-sm table-bordered mr-0 ml-0">
        <thead class="table-dark">
            <tr>
                <td>Full name</td>
                <td>---</td>
            </tr>
        </thead>
        <tbody>
        @foreach($students as $student)
            <tr>
                <td>{{ $student->name.' '.$student->lastname }}</td>
                <td><a href="{{ route('students.show',$student->id) }}">Show</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<div class="row justify-content-around mt-4">
    <a class="btn btn-info col-md-3 ml-0 mr-0" href="{{ route('groups.index') }}">Back</a>
    <a class="btn btn-warning col-md-3 ml-0 mr-0" href="{{ route('groups.edit',$group->id) }}">Edit</a>
    <a class="btn btn-danger col-md-3 ml-0 mr-0" href="#" id="btnDelete">DELETE</a>
</div>

<div class="alert alert-info mt-3" id="alert-delete" role="alert">
    <h2 class="text-center">Are you sure about delete this group?</h2>
    <div class="row justify-content-around mt-3">
        <button class="btn btn-success col-md-4 m-0" id="btnCancel">Cancel</button>
        <button class="btn btn-danger col-md-4 m-0" id="btnConfirm">Confirm</button>
        <input type="hidden" value="{{ $group->id }}" id="item_id">
        <input type="hidden" value="groups" id="item_type">
    </div>
</div>

    @section('scripts')
    <script src="{{ asset('js/main/delete.js') }}"></script>
    @endsection

@endsection