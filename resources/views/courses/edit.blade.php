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

    <form action="{{ route('courses.update',$course->id) }}" method="POST">
    @csrf
    {{ method_field('PUT') }}

        <div class="col-6">
            <label for="">Name</label>
            <input class="form-control" name="name" type="text" value="{{ $course->course }}">
        </div>

        <div class="row ml-0 mr-0">
            <div class="col">
                <label for="">Weekly cost</label>
                <input class="form-control" type="number" name="weeklycost" value="{{ $course->weeklycost }}">
            </div>

            <div class="col">
                <label for="">Monthly cost</label>
                <input class="form-control" type="number" name="monthlycost" value="{{ $course->monthlycost }}">
            </div>
        </div>

        <div class="row justify-content-around mt-3">
            <button class="btn btn-warning btn-lg col-md-4 m-0" type="submit">Edit course</button>
            <a class="btn btn-info btn-lg col-md-4 m-0" href="{{ route('courses.show',$course->id) }}" >Back</a>
        </div>
    
    </form>

@endsection