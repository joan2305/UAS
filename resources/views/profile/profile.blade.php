@extends('layouts.app')

@section('title', 'Amazing | ' . __('home.profile'))

@section('content')
    @php
        $user = Auth::user();
    @endphp

    <div class="container">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ __('home.updateProfSuc') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <h3 class="card-title text-bold text-center">{{ __('home.editProfile') }}</h3>
    </div>
    <div class="container d-flex justify-content-center mt-2" style="">

        <div class="card mb-3" style="">
            <div class="row g-0 ">
                <div class="col-md-4">

                    <img src="{{ asset('storage/images/dp/' . $user->displayPicture) }}"
                        class="img-fluid rounded-circle p-2" alt="...">
                </div>
                <div class="col-md-7 ms-3">
                    <div class="card-body ">
                        <form action="{{ route('updateProfile', $user->id) }}" method="POST" enctype="multipart/form-data"
                            class="mt-2">
                            @method('PUT')
                            @csrf

                            <div class="form-group mb-3 profile-form ">
                                <label for="first_name">{{ __('home.fname') }}</label>
                                <input type="text" name="first_name"
                                    class="input-text form-control @error('first_name') is-invalid @enderror"
                                    placeholder="{{ __('home.fname') }}"
                                    value="{{ old('first_name') != null ? old('first_name') : $user->firstName }}">
                                @error('first_name')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group mb-3 profile-form">
                                <label for="last_name">{{ __('home.lname') }}</label>
                                <input type="text" name="last_name"
                                    class="input-text form-control @error('last_name') is-invalid @enderror"
                                    placeholder="{{ __('home.lname') }}"
                                    value="{{ old('last_name') != null ? old('last_name') : $user->lastName }}">
                                @error('last_name')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group mb-3 profile-form">
                                <label for="email">{{ __('home.emailAddress') }}</label>
                                <input type="text" name="email"
                                    class="input-text form-control @error('email') is-invalid @enderror"
                                    placeholder="{{ __('home.emailAddress') }}"
                                    value="{{ old('email') != null ? old('email') : $user->email }}">
                                @error('email')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label">{{ __('Password') }}</label>
                                <div class="form-group mb-3 profile-form">
                                    <input id="password" type="password"
                                        class="input-text form-control @error('password') is-invalid @enderror"
                                        name="password" autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-3 profile-form">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label">{{ __('home.cPass') }}</label>
                                <div class="col-md-12">
                                    <input id="password-confirm" type="password" class="input-text form-control"
                                        name="password_confirmation" autocomplete="new-password">
                                </div>
                            </div>
                            <div class="form-group mb-3 profile-form">
                                <label for="gender" class="col-md-4 col-form-label">{{ __('home.gender') }}</label>
                                <div class="col-md-12">
                                    <input type="radio" value="Male" id="male" name="gender"
                                        class="@error('gender') is-invalid @enderror">
                                    @if ($user->gender == 'Male')
                                        <label for="male" style="color:black">{{ __('home.male') }}</label>
                                        <input type="radio" value="Female" id="female" name="gender" checked>
                                        <label for="female"style="color:black">{{ __('home.female') }}</label>
                                    @else
                                        <label for="male" style="color:black">{{ __('home.male') }}</label>
                                        <input type="radio" value="Female" id="female" name="gender" checked>
                                        <label for="female"style="color:black">{{ __('home.female') }}</label>
                                    @endif
                                    @if ($errors->has('gender'))
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('gender') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group mb-3 profile-form">
                                <label for="role" class="col-md-4 col-form-label">{{ __('home.role') }}</label>
                                <input class="input-text form-control" type="text" placeholder="{{ $user->role }}"
                                    disabled readonly>
                            </div>
                            <div class="form-group mb-3">
                                <p>{{ __('home.savedImage') }} : {{ $user->originalImageName }}</p>

                                <input type="file" name="display_picture"
                                    class="form-control @error('display_picture') is-invalid @enderror">
                                @error('display_picture')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="row mb-0">
                                <div class="d-grid gap-2 col-12">
                                    <button type="submit" class="btn btn-submit"
                                        style="background-color: #609587!important;color:white!important">
                                        {{ __('home.save') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
