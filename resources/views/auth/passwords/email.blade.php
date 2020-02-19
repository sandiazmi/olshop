@extends('layouts.app')

@section('content')
<div class="container">
    <div class="columns is-centered">
        <div class="column is-half">
            <h1 class="is-size-3">Reset Password</h1>

            @if (session('status'))
            <div class="notification is-info">
                {{ session('status') }}
            </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
                @csrf

                <div class="field">
                    <label for="" class="label">Email</label>
                    <input type="email" class="input {{ $errors->has('email') ? ' is-danger' : '' }}" name="email"
                        value="{{ old('email') }}">

                    @if ($errors->has('email'))
                    <p class="help is-danger">
                        {{ $errors->first('email') }}
                    </p>
                    @endif
                </div>

                <div class="form-group row mb-0">
                    <button type="submit" class="button is-info">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
