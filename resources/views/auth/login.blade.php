@extends('layouts.app')
@section('title', 'Amazing | ' . __('home.login'))
@section('content')
    <div class="container mt-2">

        <div class="card mb-3 me-5 ms-5" style="box-shadow: 5px 5px 10px 1px rgba(0,0,0,0.2);">
            <div class="row" style="">
                <div class="col-md-4">
                    <img src="{{ asset('storage/images/loginbg.jpg') }}" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body mt-5 ms-3 input-box">
                        <h1>Ama<span style="color:#609587">Zing</span></h1>
                        <p style="font-weight: 500;">{{ __('home.signIn') }}</p>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <label for="email" class="col-md-4 col-form-label">{{ __('home.emailAddress') }}</label>
                            <div class="row mb-3">

                                <div class="col-md-8">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <label for="password" class="col-md-4 col-form-label">{{ __('Password') }}</label>
                            <div class="row mb-2">

                                <div class="col-md-8">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 ">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label " for="remember" style="font-size: 80%">
                                            {{ __('home.remember') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2">
                                @if ($errors->any())
                                    <p class="text-danger"style="font-weight: bold;font-size:80%">{{ $errors->first() }}
                                    </p>
                                @endif
                            </div>
                            <div class="row mb-0">
                                <div class="d-grid gap-2 col-8">
                                    <button type="submit" class="btn btn-primary"
                                        style="background-color: #c9433a!important;">
                                        {{ __('home.login') }}
                                    </button>
                                </div>
                            </div>
                            <a href="/register" class="text-decoration-none"
                                style="font-size: 80%;color:#609587;font-weight: bold">{{ __('home.dontHave') }}
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
