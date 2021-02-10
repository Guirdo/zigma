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

    <form action="{{ route('employees.store') }}" method="post">
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

        <div class="col-6 mt-3">
            <label for="">Gender</label>
            <select class="form-control" name="gender">
                <option value="1" @if(old('gender') == 1) selected @endif >FEMALE</option>
                <option value="2" @if(old('gender') == 2) selected @endif>MALE</option>
                <option value="3" @if(old('gender') == 3) selected @endif>NON-BINARY</option>
            </select>
        </div>

        <div class="row mt-3 ml-0 mr-0">
            <div class="col">
                <label for="">Email</label>
                <input class="form-control" type="email" name="email" value="{{ old('email') }}">
            </div>
            <div class="col">
                <label for="">Phone number</label>
                <input class="form-control" type="tel" name="phonenumber" value="{{ old('phonenumber') }}">
            </div>
        </div>

        <div class="col mt-3">
            <label for="">Address</label>
            <input class="form-control" type="text" name="address" value="{{ old('address') }}">
        </div>

        <div class="col-6 mt-3">
            <label for="">Employee type</label>
            <select class="form-control" name="employeetype">
                @foreach($employeetypes as $et)
                <option value="{{ $et->id }}" @if(old('employeetype') == $et->id) selected @endif>{{ $et->employeetype }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-6 mt-3 d-none">
            <label for="">Photo</label>
            <input class="form-control-file" type="file" name="photo">
        </div>

        <div class="row justify-content-around mt-4">
            <a class="btn btn-info btn-lg col-md-4 m-0" href="{{ route('users.index') }}" type="submit">Back</a>
            <button class="btn btn-success btn-lg col-md-4 m-0" type="submit">Add employee</button>
        </div>
    
    </form>

@endsection