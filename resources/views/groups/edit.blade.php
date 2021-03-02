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

    <form action="{{ route('groups.update',$group->id) }}" method="POST">
    @csrf
    {{ method_field('PUT') }}

    <div class="col-6">
            <label for="">Select days</label>
            <select name="days" class="form-control">
                <option value="MondayToFriday" {{ $group->days == 'MondayToFriday' ? 'selected' : '' }}>Monday to Friday</option>
                <option value="Monday" {{ $group->days == 'Monday' ? 'selected' : '' }}>Monday</option>
                <option value="Tuesday" {{ $group->days == 'Tuesday' ? 'selected' : '' }}>Tuesday</option>
                <option value="Wednesday" {{ $group->days == 'Wednesday' ? 'selected' : '' }}>Wednesday</option>
                <option value="Thursday" {{ $group->days == 'Thursday' ? 'selected' : '' }}>Thursday</option>
                <option value="Friday" {{ $group->days == 'Friday' ? 'selected' : '' }}>Friday</option>
                <option value="Saturday" {{ $group->days == 'Saturday' ? 'selected' : '' }}>Saturday</option>
                <option value="Sunday" {{ $group->days == 'Sunday' ? 'selected' : '' }}>Sunday</option>
            </select>
        </div>

        <div class="row justify-content-between mt-3 ml-0 mr-0">
            <div class="col">
                <label for="">Start hour</label>
                <input type="time" name="starthour" class="form-control" value="{{ $group->starthour }}">
            </div>
            <div class="col">
                <label for="">Final hour</label>
                <input type="time" name="finalhour" class="form-control" value="{{ $group->finalhour }}">
            </div>
        </div>

        <div class="col-6 mt-3">
            <label for="">First date</label>
            <input class="form-control" type="date" name="firstdate" value="{{ $group->firstdate }}">
        </div>

        <div class="col-6 mt-3">
            <label for="">Course</label>
            <select class="form-control" name="course_id">
                @foreach($courses as $course)
                <option value="{{ $course->id }}" {{ $course->id == $group->course_id ? 'selected' : '' }}>{{ $course->course }}</option>
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
                    <tbody id="tbody">
                    <tr>
                        <td><input type="radio" name="teacher_id" value="{{ $teacher->id }}" checked></td>
                        <td>{{ $teacher->id }}</td>
                        <td>{{ $teacher->name.' '.$teacher->lastname }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row justify-content-around mt-3">
            <button class="btn btn-warning btn-lg col-md-4 m-0" type="submit">Edit group</button>
            <a class="btn btn-info btn-lg col-md-4 m-0" href="{{ route('groups.show',$group->id) }}" >Back</a>
        </div>
    
    </form>

@endsection