@extends('layouts.app')

@section('title', 'Amazing | ' . __('home.checkSuccess'))

@section('content')
    <div class="container">
        <div class="index-img text-center">
            <img src="{{ asset('storage/images/success.gif') }}" alt="" width="30%">
            <h3 class="" style="color: #80d0c7;font-family: 'Viga', sans-serif;
        ">
                {{ __('home.checkSuccessIndex') }}
            </h3>
        </div>
        <div class="back d-flex justify-content-center ">
            <a href="{{ route('home') }}" class="text-center"><img src="{{ asset('storage/images/back.png') }}" alt=""
                    style="width: 10%"></a>
        </div>
    </div>
@endsection
