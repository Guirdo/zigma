@extends('layouts.app')

@section('content')

<div class="row justify-content-center mb-4">
    <a class="btn btn-success btn-lg" href="{{ route('employees.create') }}">Add employee</a>
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
                <th>Full name</th>
                <th>Email</th>
                <th>---</th>
            </tr>
        </thead>

        <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->name.' '.$employee->lastname }}</td>
                    <td>{{ $employee->email }}</td>
                    <td><a href="{{ route('employees.show',$employee->id) }}">Show</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="row justify-content-center">
        {!! $employees->links() !!}
    </div>

</div>

@endsection