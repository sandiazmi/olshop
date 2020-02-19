@extends('layouts.app')

@section('content')
<div class="container">
    <div class="columns is-centered">
        <div class="column is-half box">
            <h1 class="is-size-3">Reset Password</h1>

            <form method="POST" action="{{ route('password.request') }}" aria-label="{{ __('Reset Password') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

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

                <div class="field">
                    <label for="" class="label">Password</label>
                    <input type="password" class="input {{ $errors->has('password') ? ' is-danger' : '' }}"
                        name="password" value="{{ old('password') }}">

                    @if ($errors->has('password'))
                    <p class="help is-danger">
                        {{ $errors->first('password') }}
                    </p>
                    @endif
                </div>

                <div class="field">
                    <label for="" class="label">Confirm Password</label>
                    <input type="password" class="input {{ $errors->has('password_confirmation') ? ' is-danger' : '' }}"
                        name="password_confirmation" value="{{ old('password_confirmation') }}">

                    @if ($errors->has('password_confirmation'))
                    <p class="help is-danger">
                        {{ $errors->first('password_confirmation') }}
                    </p>
                    @endif
                </div>

                <div class="field">
                    <button type="submit" class="button is-info">
                        {{ __('Reset Password') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
