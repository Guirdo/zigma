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
        </tbody>
    </table>

@section('scripts')
<script src="{{ asset('js/payment/pay.js') }}"></script>
@endsection

@endsection