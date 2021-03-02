@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/scroll_table.css') }}">
@endsection

@section('content')

    @if($errors->any())
        <div class="alert alert-warning" role="alert">
            <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('groups.store') }}" method="post">
    @csrf

        <div class="col-6">
            <label for="">Select days</label>
            <select name="days" class="form-control">
                <option value="MondayToFriday">Monday to Friday</option>
                <option value="Monday">Monday</option>
                <option value="Tuesday">Tuesday</option>
                <option value="Wednesday">Wednesday</option>
                <option value="Thursday">Thursday</option>
                <option value="Friday">Friday</option>
                <option value="Saturday">Saturday</option>
                <option value="Sunday">Sunday</option>
            </select>
        </div>

        <div class="row justify-content-between mt-3 ml-0 mr-0">
            <div class="col">
                <label for="">Start hour</label>
                <input type="time" name="starthour" class="form-control" value="{{ old('starthour') }}">
            </div>
            <div class="col">
                <label for="">Final hour</label>
                <input type="time" name="finalhour" class="form-control" value="{{ old('finalhour') }}">
            </div>
        </div>

        <div class="col-6 mt-3">
            <label for="">First date</label>
            <input class="form-control" type="date" name="firstdate" value="{{ old('firstdate') }}">
        </div>

        <div class="col-6 mt-3">
            <label for="">Course</label>
            <select class="form-control" name="course_id">
                @foreach($courses as $course)
                <option value="{{ $course->id }}">{{ $course->course }}</option>
                @endforeach
            </select>
        </div>

        <div class="col mr-3 mt-4">
            <div class="row ml-0 mr-0 justify-content-between">
                <label for="">Search teacher</label>
                <div class="col-6 ml-0">
                    <input class="form-control" type="text" id="inpSearch">
                </div>
                <button class="btn btn-primary" id="btnSearch">Search</button>
            </div>

            <div class="my-custom-scrollbar table-wrapper-scroll-y">
                <table class="table table-sm table-bordered mt-3">
                    <thead class="table-dark">
                        <tr>
                            <th>Select</th>
                            <th>ID</th>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody id="tbody"></tbody>
                </table>
            </div>
        </div>

        <div class="row justify-content-around mt-4">
            <a class="btn btn-info btn-lg col-md-4 m-0" href="{{ route('groups.index') }}" type="submit">Back</a>
            <button class="btn btn-success btn-lg col-md-4 m-0" type="submit">Add group</button>
        </div>
    
    </form>

@section('scripts')
<script src="{{ asset('js/employees/searchTeacher.js') }}"></script>
@endsection

@endsection