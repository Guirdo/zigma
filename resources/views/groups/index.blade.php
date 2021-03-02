@extends('layouts.app')

@section('content')

<div class="row justify-content-center mb-4">
    <a class="btn btn-success btn-lg" href="{{ route('groups.create') }}">Add groups</a>
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
                <th>Course</th>
                <th>Schedule</th>
                <th>---</th>
            </tr>
        </thead>

        <tbody>
            @php( $i = 0)
            @foreach($groups as $group)
                <tr>
                    <td>{{ $group->id }}</td>
                    <td>{{ $courses[$group->course_id - 1]->course }}</td>
                    <td>{{ $group->getSchedule() }}</td>
                    <td><a href="{{ route('groups.show',$group->id) }}">Show</a></td>
                </tr>
                @php($i = $i+1)
            @endforeach
        </tbody>
    </table>

    <div class="row justify-content-center">
        {!! $groups->links() !!}
    </div>

</div>

@endsection