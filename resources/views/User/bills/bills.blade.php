@extends('layouts.user.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">{{ __('Transaction') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('store-bills') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <select id="organization" class="form-control @error('organization') is-invalid @enderror" name="organization" required>
                                <option value="" selected disabled>{{ __('Select organization') }}</option>
                                <option value="Water bill">{{ __('Water bill') }}</option>
                                <option value="Electricity bill">{{ __('Electricity bill') }}</option>
                                <option value="Landline phone bill">{{ __('Landline phone bill') }}</option>
                                <option value="Internet bill">{{ __('Internet bill') }}</option>
                            </select>
                            @error('organization')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="account_number">{{ __('Account Number') }}</label>
                            <input id="account_number" type="text" class="form-control @error('account_number') is-invalid @enderror" name="account_number" value="{{ old('account_number') }}" required autofocus>
                            @error('account_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="amount">{{ __('Amuont') }}</label>
                            <input disabled id="amount" type="amount" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ old('amount') }}" required>
                            @error('amount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <input id="amount_val" type="hidden" name="amount">
                        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#organization, #account_number').on('change', function() {
            var organizationValue = $('#organization').val();
            var accountNumberValue = $('#account_number').val();
            if (organizationValue && accountNumberValue) {
                var randomAmount = Math.floor(Math.random() * 900) + 100;
                $('#amount').val(randomAmount);
                $('#amount_val').val(randomAmount);
            }
        });
    });
</script>
@endsection
