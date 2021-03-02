@extends('layouts.app')

@section('content')

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
                <th>Full name</th>
                <th>---</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->getFullName() }}</td>
                <td><a href="{{ route('payments.pay',$student) }}">Pay</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="row justify-content-center">
        {!! $students->links() !!}
    </div>

</div>

@endsection