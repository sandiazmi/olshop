@extends('layouts.app')

@section('content')
<div class="container">
    <div class="columns is-centered">
        <div class="column is-half box">
            <h1 class="is-size-3">Register</h1>

            <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                @csrf

                <div class="field">
                    <label for="" class="label">Name</label>
                    <input type="text" class="input {{ $errors->has('name') ? ' is-danger' : '' }}" name="name"
                        value="{{ old('name') }}">

                    @if ($errors->has('name'))
                    <p class="help is-danger">
                        {{ $errors->first('name') }}
                    </p>
                    @endif
                </div>

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
                    <label for="" class="label">Address</label>
                    <input type="text" class="input {{ $errors->has('address') ? ' is-danger' : '' }}" name="address"
                        value="{{ old('address') }}">

                    @if ($errors->has('address'))
                    <p class="help is-danger">
                        {{ $errors->first('address') }}
                    </p>
                    @endif
                </div>

                <div class="field">
                    <label for="" class="label">Phone</label>
                    <input type="number" class="input {{ $errors->has('phone') ? ' is-danger' : '' }}" name="phone"
                        value="{{ old('phone') }}">

                    @if ($errors->has('phone'))
                    <p class="help is-danger">
                        {{ $errors->first('phone') }}
                    </p>
                    @endif
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="button is-info">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
@endsection
