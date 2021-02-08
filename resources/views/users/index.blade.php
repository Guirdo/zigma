@extends('layouts.app')

@section('content')

<div class="row justify-content-center mb-4">
    <a class="btn btn-success btn-lg" href="{{ route('users.create') }}">Add user</a>
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
                <th>Name</th>
                <th>Email</th>
                <th>---</th>
            </tr>
        </thead>

        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td><a href="{{ route('users.show',$user->id) }}">Show</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection