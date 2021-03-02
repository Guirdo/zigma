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

    <form action="{{ route('courses.store') }}" method="post">
    @csrf

        <div class="col-6 mt-3">
            <label for="">Name</label>
            <input class="form-control" name="name" type="text" value="{{ old('name') }}">
        </div>

        <div class="row justify-content-between ml-0 mr-0 mt-3">
            <div class="col">
                <label for="">Weekly cost</label>
                <input class="form-control" type="number" name="weeklycost" value="{{ old('weeklycost') }}">
            </div>

            <div class="col">
                <label for="">Monthly cost</label>
                <input class="form-control" type="number" name="monthlycost" value="{{ old('monthlycost') }}">
            </div>
        </div>

        <div class="row justify-content-around mt-4">
            <a class="btn btn-info btn-lg col-md-4 m-0" href="{{ route('courses.index') }}" type="submit">Back</a>
            <button class="btn btn-success btn-lg col-md-4 m-0" type="submit">Add course</button>
        </div>
    
    </form>

@section('scripts')
<script src="{{ asset('js/tutors/search.js') }}"></script>
@endsection

@endsection