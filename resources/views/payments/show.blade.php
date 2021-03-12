@extends('layouts.app')

@section('content')

    <table class="table table-sm table-bordered">
        <tbody>
            <tr>
                <td class="table-dark">Date</td>
                <td>{{ $payment->created_at }}</td>
            </tr>
            <tr>
                <td class="table-dark">Student</td>
                <td>{{ $student->getFullName() }}</td>
            </tr>
            <tr>
                <td class="table-dark">Group</td>
                <td>{{ $group->getSchedule() }}</td>
            </tr>
            <tr>
                <td class="table-dark">Course</td>
                <td>{{ $course->course }}</td>
            </tr>
            <!--  Information  -->            
            <tr>
                <td class="table-dark text-center" colspan="2">Information</td>
            </tr>
            <tr>
                <td class="table-dark">Concept</td>
                <td>{{ $concept->concept }}</td>
            </tr>
            <tr>
                <td class="table-dark">Amount</td>
                <td>${{ $payment->amount }}</td>
            </tr>
            <tr>
                <td class="table-dark">Surcharge</td>
                <td>${{ $payment->surcharge}}</td>
            </tr>
            <tr>
                <td class="table-dark text-center" colspan="2">Total</td>
            </tr>
            <tr>
                <td class="text-center font-weight-bold" colspan="2">${{ $payment->amount + $payment->surcharge }}</td>
            </tr>

        </tbody>
    </table>

    <div class="row justify-content-center">
        <input type="hidden" id="payment_id" value="{{ $payment->id }}">
        <button class="btn btn-success btn-lg" id="btnPrint">Print</button>
    </div>

@section('scripts')
<script src="{{ asset('js/payment/print.js') }}"></script>
@endsection

@endsection