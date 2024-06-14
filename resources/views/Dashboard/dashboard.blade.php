@extends('layouts.dashboard.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">{{ __('Users Count') }}</div>

                    <div class="card-body">
                        {{ $users }}
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">{{ __('Transactions Count') }}</div>

                    <div class="card-body">
                        {{ $transactions }}
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">{{ __('Bills Count') }}</div>

                    <div class="card-body">
                        {{ $bills }}
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">{{ __('Amount Count') }}</div>

                    <div class="card-body">
                        {{ $amount }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
