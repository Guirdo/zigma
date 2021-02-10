@extends('layouts.app')

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

    <form action="{{ route('students.update',$student->id) }}" method="POST">
    @csrf
    {{ method_field('PUT') }}

    <div class="row ml-0 mr-0">
            <div class="col-6">
                <label for="">Name</label>
                <input class="form-control" name="name" type="text" value="{{ $student->name }}">
            </div>
            <div class="col-6">
                <label for="">Last name</label>
                <input class="form-control" type="text" name="lastname" value="{{ $student->lastname }}">
            </div>
        </div>

        <div class="row mt-3 ml-0 mr-0">
            <div class="col">
                <label for="">Birthday</label>
                <input class="form-control" type="date" name="birthday" value="{{ $student->birthday }}">
            </div>

            <div class="col">
                <label for="">Gender</label>
                <select class="form-control" name="gender">
                    <option value="1" @if($student->gender == 'FEMALE') selected @endif>FEMALE</option>
                    <option value="2" @if($student->gender == 'MALE') selected @endif>MALE</option>
                    <option value="3" @if($student->gender == 'NON-BINARY') selected @endif>NON-BINARY</option>
                </select>
            </div>
        </div>

        <div class="col-6 mt-3">
            <label for="">Email</label>
            <input class="form-control" type="email" name="email" value="{{ $student->email }}">
        </div>

        <div class="col mt-3">
            <label for="">Address</label>
            <input class="form-control" type="text" name="address" value="{{ $student->address }}">
        </div>

        <div class="col-6 mt-3">
            <label for="">Phone number</label>
            <input class="form-control" type="tel" name="phonenumber" value="{{ $student->phonenumber }}">
        </div>

        <div class="col-6 mt-3 d-none">
            <label for="">Photo</label>
            <input class="form-control-file" type="file" name="photo">
        </div>

        <div class="row justify-content-around mt-3">
            <button class="btn btn-warning btn-lg col-md-4 m-0" type="submit">Edit student</button>
            <a class="btn btn-info btn-lg col-md-4 m-0" href="{{ route('students.show',$student->id) }}" >Back</a>
        </div>
    
    </form>

@endsection