@extends('layouts.app')

@section('content')
    <div class="authBody">
        <div class="auth">
                    <h1 class='authH1' >Login</h1>

                        <form class="authForm" method="POST" action="{{ route('login') }}">
                            @csrf

                                <label for="email" class="authLabel">{{ __('Email Address') }}</label>

                                    <input id="email" type="email" class="authInput @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                <label for="password" class="authLabel">{{ __('Password') }}</label>

                                    <input id="password" type="password" class="authInput @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror


                                    <button type="submit" class="authButton">
                                        {{ __('Login') }}
                                    </button>

                                    <p class='authOR' >or</p>
                                    <a  class='authButtonOther' type='submit' href='/register' >Register</a>



        </div>
                            </div>
                        </form>
                    </div>
                </div>
@endsection
