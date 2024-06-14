@extends('layouts.dashboard.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-10">
                                <h4>Dashboard -> Users</h4>
                            </div>
                            <div class="col-md-2 text-right">
                                <a href="{{ route('create-users') }}" class="btn btn-primary w-100">{{ __('Add Users') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Email') }}</th>
                                    <th>{{ __('Phone') }}</th>
                                    <th>{{ __('Amount') }}</th>
                                    <th>{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $val )
                                <tr>
                                    <td>{{ $val['name'] }}</td>
                                    <td>{{ $val['email'] }}</td>
                                    <td>{{ $val['phone'] }}</td>
                                    <td>{{ $val['amount'] }}</td>
                                    <td>
                                        <a href="{{ route('show-users', ['id' => $val['id'] ]) }}" class="btn btn-primary">{{ __('Edit') }}</a> 
                                        <form style="display: inline-block;" method="POST" action="{{ route('destroy-users', $val['id']) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
