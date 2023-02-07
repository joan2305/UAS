@extends('layouts.app')
@section('title', 'Amazing | ' . __('home.updateRole'))

@section('content')
    <div class="container mt-5 d-flex justify-content-center">
        <div class="row mb-3 col-md-5">
            <div class="col-md-12">
                <form action="{{ route('updateRole', $user->id) }}" method="POST">
                    @method('PUT')
                    @csrf

                    <h5>{{ __('home.account') }} : <span style="font-weight: bold">{{ $user->firstName }}
                            {{ $user->lastName }}</span></h5>
                    <label for="role">{{ __('home.role') }}</label>
                    <select class="form-select" aria-label="Default select example" name="role">
                        @if ($user->role == 'Admin')
                            <option value="User">User</option>
                            <option selected value="Admin">Admin</option>
                        @else
                            <option selectedvalue="User">User</option>
                            <option value="Admin">Admin</option>
                        @endif
                    </select>

                    @if ($errors->has('role'))
                        <div class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('role') }}</strong>
                        </div>
                    @endif
            </div>
            <div class="row mb-0 mt-3">
                <div class="d-grid gap-2 col-12">
                    <button type="submit" class="btn btn-submit"
                        style="background-color: #609587!important;color:white!important">
                        {{ __('home.save') }}
                    </button>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection
