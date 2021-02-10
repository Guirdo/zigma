@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/scroll_table.css') }}">
@endsection

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

    <form action="{{ route('users.store') }}" method="post">
    @csrf

        <div class="col-6">
            <label for="">Name</label>
            <input class="form-control" name="name" type="text" value="{{ old('name') }}">
        </div>

        <div class="col-6 mt-3">
            <label for="">Email</label>
            <input class="form-control" type="text" name="email" value="{{ old('email') }}">
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

        <div class="row mt-4 ml-3 mr-3 px-0 justify-content-between">
            <label for="">Search employee</label>
            <div class="col-5">
                <input class="form-control" type="text" id="inpSearch">
            </div>
            <button class="btn btn-primary" id="btnSearch">Search</button>
            <button class="btn btn-warning">Add new employee</button>
        </div>

        <div class="my-custom-scrollbar table-wrapper-scroll-y ml-3 mr-3">
            <table class="table table-sm table-bordered mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>Select</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Employee type</th>
                    </tr>
                </thead>
                <tbody id="tbody"></tbody>
            </table>
        </div>

        <div class="col-6 mt-3">
            <label for="">User type</label>
            <select class="form-control" name="usertype" id="">
            @foreach($usertypes as $ut)
                <option value="{{ $ut->id }}">{{ $ut->usertype }}</option>
            @endforeach
            </select>
        </div>

        <div class="row justify-content-around mt-4">
            <a class="btn btn-info btn-lg col-md-4 m-0" href="{{ route('users.index') }}" type="submit">Back</a>
            <button class="btn btn-success btn-lg col-md-4 m-0" type="submit">Add user</button>
        </div>
    
    </form>

@section('scripts')
    <script src="{{ asset('js/employees/search.js') }}"></script>
@endsection

@endsection