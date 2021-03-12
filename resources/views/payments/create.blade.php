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

    <form action="{{ route('payments.store') }}" method="post">
    @csrf

        <div class="row justify-content-between ml-0 mr-0">
            <div class="col">
                <h3>Student</h3>
                <p>{{ $student->getFullName() }}</p>
                <input type="hidden" name="student_id" value="{{ $student->id }}">
            </div>

            <div class="col">
                <h3>Enrollment</h3>
                <p>{{ $student->enrollment   }}</p>
            </div>
        </div>

        <div class="row justify-content-between ml-0 mr-0">
            <div class="col">
                <h3>Course</h3>
                <p>{{ $course->course }}</p>
            </div>

            <div class="col">
                <h3>Group</h3>
                <p>{{ $group->getSchedule() }}</p>
                <input type="hidden" name="group_id" value="{{ $group->id }}">
            </div>
        </div>

        <div class="col-6">
            <h3>Concept</h3>
            <select class="form-control" name="concept_id" id="concept">
                @foreach($concepts as $concept)
                    <option value="{{ $concept->id }}">{{ $concept->concept }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-6 mt-3">
            <h3>Amount</h3>
            <input class="form-control" type="number" name="amount" id="amount" readonly value="{{ $amount }}">
            <input type="hidden" id="default_amount" value="{{ $amount }}">
        </div>

        <div class="col-6 mt-3">
            <h3>Surcharge</h3>
            <input class="form-control" type="text" name="surcharge" id="surcharge" value="0" autocomplete="off">
        </div>

        <div class="col-6 mt-3">
            <h3>Total</h3>
            <input class="form-control" type="number" name="total" id="total" readonly>
        </div>

        <div class="row justify-content-around mt-4">
            <a class="btn btn-info btn-lg col-md-4 m-0" href="{{ route('payments.index') }}" type="submit">Back</a>
            <button class="btn btn-success btn-lg col-md-4 m-0" type="submit">Confirm</button>
        </div>
    
    </form>

@section('scripts')
<script src="{{ asset('js/payment/pay.js') }}"></script>
@endsection

@endsection