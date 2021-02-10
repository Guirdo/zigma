@extends('layouts.app')

@section('content')

<div class="row justify-content-center mb-4">
    <a class="btn btn-success btn-lg" href="{{ route('courses.create') }}">Add course</a>
</div>

<div class="row mb-3">
    <div class="col-sm-4">
        <input class="form-control" type="text" placeholder="Search">
    </div>
    <button class="btn btn-primary">Search</button>
</div>

<div class="row ml-0">

    <table class="table table-sm table-bordered border-danger mr-2">
        <thead>
            <tr class="table-warning">
                <th>ID</th>
                <th>Name</th>
                <th>Cost($)</th>
                <th>---</th>
            </tr>
        </thead>

        <tbody>
            @foreach($courses as $course)
                <tr>
                    <td>{{ $course->id }}</td>
                    <td>{{ $course->course }}</td>
                    <td>{{ $course->cost }}</td>
                    <td><a href="{{ route('courses.show',$course->id) }}">Show</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="row justify-content-center">
        {!! $courses->links() !!}
    </div>

</div>

@endsection