@extends('layouts.app')

@section('content')
    <div class="authBody">
        <div class="auth">
                    <h1 class='authH1' >Register</h1>

                        <form class="authForm" method="POST" action="{{ route('register') }}">
                            @csrf

                                <label for="name" class="authLabel">{{ __('Name') }}</label>

                                    <input id="name" type="text" class="authInput @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                             <label for="email" class="authLabel">{{ __('Email Address') }}</label>

                                    <input id="email" type="email" class="authInput @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                <label for="password" class="authLabel">{{ __('Password') }}</label>

                                    <input id="password" type="password" class="authInput @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror



                                    <button type="submit" class="authButton">
                                        {{ __('Register') }}
                                    </button>

                                    <p class='authOR' >or</p>
                                    <a  class='authButtonOther' type='submit' href='/login' >Login</a>


    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
