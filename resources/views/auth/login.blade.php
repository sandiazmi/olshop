@extends('layouts.app')

@section('content')
<div class="container">
    <div class="columns is-centered">
        <div class="column is-half box">
            <h1 class="is-size-3">Login</h1>

            <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
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
                    <label class="checkbox">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}> Remember Me
                    </label>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="button is-info">
                            {{ __('Login') }}
                        </button>

                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
