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

    <form action="{{ route('students.store') }}" method="post">
    @csrf

        <div class="row ml-0 mr-0">
            <div class="col-6">
                <label for="">Name</label>
                <input class="form-control" name="name" type="text" value="{{ old('name') }}">
            </div>
            <div class="col-6">
                <label for="">Last name</label>
                <input class="form-control" type="text" name="lastname" value="{{ old('lastname') }}">
            </div>
        </div>

        <div class="row mt-3 ml-0 mr-0">
            <div class="col">
                <label for="">Birthday</label>
                <input class="form-control" type="date" name="birthday" value="{{ old('birthday') }}">
            </div>
            <div class="col">
                <label for="">Gender</label>
                <select class="form-control" name="gender">
                    <option value="1" @if(old('gender') == 1) selected @endif >FEMALE</option>
                    <option value="2" @if(old('gender') == 2) selected @endif>MALE</option>
                    <option value="3" @if(old('gender') == 3) selected @endif>NON-BINARY</option>
                </select>
            </div>
        </div>

        <div class="col-6 mt-3">
            <label for="">Email</label>
            <input class="form-control" type="email" name="email" value="{{ old('email') }}">
        </div>

        <div class="col mt-3">
            <label for="">Address</label>
            <input class="form-control" type="text" name="address" value="{{ old('address') }}">
        </div>

        <div class="col-6 mt-3">
            <label for="">Phone number</label>
            <input class="form-control" type="tel" name="phonenumber" value="{{ old('phonenumber') }}">
        </div>

        <div class="col-6 mt-3 d-none">
            <label for="">Photo</label>
            <input class="form-control-file" type="file" name="photo">
        </div>

        <div class="col-6 mt-3 ml-0 mr-0">
            <label for="">Payment type</label>
            <select class="form-control" name="payment_type">
                <option value="1">Weekly</option>
                <option value="2">Monthly</option>
            </select>
        </div>

        <div class="col mr-3 mt-4">
            <div class="row ml-0 mr-0 justify-content-between">
                <label for="">Search tutor</label>
                <div class="col-5">
                    <input class="form-control" type="text" id="inpSearch">
                </div>
                <button class="btn btn-primary" id="btnSearch">Search</button>
                <a class="btn btn-warning" href="{{ route('tutors.create') }}">Add new tutor</a>
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

        <div class="col">
            <label for="">Select group</label>
            <div class="my-custom-scrollbar table-wrapper-scroll-y">
                <table class="table table-sm">
                    <thead class="table-dark">
                        <tr>
                            <td>Select</td>
                            <td>Course</td>
                            <td>Schedule</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($groups as $group)
                        <tr>
                            <td><input type="radio" name="group_id" value="{{ $group->id }}"></td>
                            <td>{{ $courses[$group->course_id - 1]->course }}</td>
                            <td>{{ $group->getSchedule() }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row justify-content-around mt-4">
            <a class="btn btn-info btn-lg col-md-4 m-0" href="{{ route('users.index') }}" type="submit">Back</a>
            <button class="btn btn-success btn-lg col-md-4 m-0" type="submit">Add student</button>
        </div>
    
    </form>

@section('scripts')
<script src="{{ asset('js/tutors/search.js') }}"></script>
@endsection

@endsection