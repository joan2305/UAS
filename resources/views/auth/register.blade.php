@extends('layouts.app')
@section('style')
    <style>
        .card-body label {
            font-weight: 550;
            color: #609587;
        }
    </style>
@endsection
@section('title', 'Amazing | ' . __('home.register'))
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="text-center mt-3">
                        <h5>{{ __('home.createAcc') }}</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}"enctype="multipart/form-data">
                            @csrf

                            <label for="first_name" class="col-md-4 col-form-label">{{ __('home.fname') }}</label>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <input id="first_name" type="text"
                                        class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                                        value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <label for="last_name" class="col-md-4 col-form-label">{{ __('home.lname') }}</label>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <input id="last_name" type="text"
                                        class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                                        value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <label for="email" class="col-md-4 col-form-label">{{ __('home.emailAddress') }}</label>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <label for="password" class="col-md-4 col-form-label">{{ __('Password') }}</label>
                            <div class="row mb-3">


                                <div class="col-md-12">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <label for="password-confirm" class="col-md-4 col-form-label">{{ __('home.cPass') }}</label>
                            <div class="row mb-3">


                                <div class="col-md-12">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>


                            <label for="gender" class="col-md-4 col-form-label">{{ __('home.gender') }}</label>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <input type="radio" value="Male" id="male" name="gender"
                                        class="@error('gender') is-invalid @enderror">
                                    <label for="male" style="color:black">{{ __('home.male') }}</label>
                                    <input type="radio" value="Female" id="female" name="gender">
                                    <label for="female"style="color:black">{{ __('home.female') }}</label>

                                    @if ($errors->has('gender'))
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('gender') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <select class="form-select" aria-label="Default select example" name="role">
                                        <option selected>{{ __('home.role') }}</option>
                                        <option value="User">User</option>
                                        <option value="Admin">Admin</option>
                                    </select>

                                    @if ($errors->has('role'))
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('role') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <label for="display_picture" class="col-md-4 col-form-label">{{ __('home.dp') }}</label>
                            <div class="form-group mb-3">
                                <input type="file" name="display_picture"
                                    class="form-control @error('dp') is-invalid @enderror">
                                @error('display_picture')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                                <div class="mb-3 mt-4">
                                    <input type="checkbox" value="agree" id="agree" name="agree" required>
                                    <label style="color:black" for="agree">{{ __('home.agree') }}</label>
                                    @error('agree')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="d-grid gap-2 col-12">
                                    <button type="submit" class="btn btn-submit"
                                        style="background-color: #609587!important;color:white!important">
                                        {{ __('home.register') }}
                                    </button>
                                </div>
                            </div>
                            <div class="mt-3 text-center">
                                <p>{{ __('home.already') }} <a href="/login"
                                        class="text-black text-decoration-none">{{ __('home.logHere') }}</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
