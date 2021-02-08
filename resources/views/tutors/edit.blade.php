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

    <form action="{{ route('tutors.update',$tutor->id) }}" method="POST">
    @csrf
    {{ method_field('PUT') }}

    <div class="row ml-0 mr-0">
            <div class="col-6">
                <label for="">Name</label>
                <input class="form-control" name="name" type="text" value="{{ $tutor->name }}">
            </div>
            <div class="col-6">
                <label for="">Last name</label>
                <input class="form-control" type="text" name="lastname" value="{{ $tutor->lastname }}">
            </div>
        </div>

        <div class="row mt-3 ml-0 mr-0">
            <div class="col">
                <label for="">Email</label>
                <input class="form-control" type="email" name="email" value="{{ $tutor->email }}">
            </div>

            <div class="col">
                <label for="">Gender</label>
                <select class="form-control" name="gender">
                    <option value="1" @if($tutor->gender == 'FEMALE') selected @endif>FEMALE</option>
                    <option value="2" @if($tutor->gender == 'MALE') selected @endif>MALE</option>
                    <option value="3" @if($tutor->gender == 'NON-BINARY') selected @endif>NON-BINARY</option>
                </select>
            </div>
        </div>

        <div class="col mt-3">
            <label for="">Address</label>
            <input class="form-control" type="text" name="address" value="{{ $tutor->address }}">
        </div>

        <div class="col-6 mt-3">
            <label for="">Phone number</label>
            <input class="form-control" type="tel" name="phonenumber" value="{{ $tutor->phonenumber }}">
        </div>

        <div class="col-6 mt-3 d-none">
            <label for="">Photo</label>
            <input class="form-control-file" type="file" name="photo">
        </div>

        <div class="row justify-content-around mt-3">
            <button class="btn btn-warning btn-lg col-md-4 m-0" type="submit">Edit tutor</button>
            <a class="btn btn-info btn-lg col-md-4 m-0" href="{{ route('tutors.show',$tutor->id) }}" type="submit">Back</a>
        </div>
    
    </form>

@endsection