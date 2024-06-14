@extends('layouts.user.app')
@section('content')
    <div class="info-boxes">
        <div class="box">
            <div><strong>Card Number: {{ auth()->user()->card_number }}</strong></div>
        </div>
        <div class="box">
            <div><strong>Card ExDate: {{ auth()->user()->card_expiry_month }}/{{ auth()->user()->card_expiry_year }}</strong></div>
        </div>
        <div class="box">
            <div><strong>Amount: {{ auth()->user()->amount }}</strong></div>
        </div>
    </div>
    <table>
        <tr>
            <th>{{ __('To') }}</th>
            <th>{{ __('Amount') }}</th>
        </tr>
        @foreach ($Received as $key => $val)
            <tr>
                <td>{{ $val['to']['card_number'] }}</td>
                <td>{{ $val['amount'] }}</td>
            </tr>
        @endforeach
    </table>

    <table>
        <tr>
            <th>{{ __('From') }}</th>
            <th>{{ __('Amount') }}</th>
        </tr>
        @foreach ($Transaction as $key => $val)
            <tr>
                <td>{{ $val['to']['card_number'] }}</td>
                <td>{{ $val['amount'] }}</td>
            </tr>
        @endforeach
    </table>

    <table>
        <tr>
            <th>{{ __('Organization') }}</th>
            <th>{{ __('Amount') }}</th>
        </tr>
        @foreach ($Bills as $key => $val)
            <tr>
                <td>{{ $val['organization'] }}</td>
                <td>{{ $val['amount'] }}</td>
            </tr>
        @endforeach
    </table>
@endsection
