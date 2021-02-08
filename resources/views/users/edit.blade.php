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

    <form action="{{ route('users.update',$user->id) }}" method="POST">
    @csrf
    {{ method_field('PUT') }}

        <div class="col-6">
            <label for="">Name</label>
            <input class="form-control" name="name" type="text" value="{{ $user->name }}">
        </div>

        <div class="col-6 mt-3">
            <label for="">Email</label>
            <input class="form-control" type="text" name="email" value="{{ $user->email }}">
        </div>

        <div class="row mt-3 ml-0 mr-0">
            <div class="col">
                <label for="">Password</label>
                <input class="form-control" type="password" name="password">
            </div>
            <div class="col">
                <label for="">Confirm password</label>
                <input class="form-control" type="password" name="confirmpw">
            </div>
        </div>

        <div class="col-6 mt-3">
            <label for="">User type</label>
            <select class="form-control" name="usertype" id="">
            @foreach($usertypes as $ut)
                @if($ut->id == $user->id)
                <option value="{{ $ut->id }}" selected>{{ $ut->usertype }}</option>
                @else
                <option value="{{ $ut->id }}">{{ $ut->usertype }}</option>
                @endif
            @endforeach
            </select>
        </div>

        <div class="row justify-content-around mt-3">
            <button class="btn btn-warning btn-lg col-md-4 m-0" type="submit">Edit user</button>
            <a class="btn btn-info btn-lg col-md-4 m-0" href="{{ route('users.show',$user->id) }}" type="submit">Back</a>
        </div>
    
    </form>

@endsection