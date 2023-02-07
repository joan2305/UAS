@extends('layouts.app')

@section('title', 'Amazing | ' . __('home.cart'))

@section('content')
    <div class="container">
        <div class="row">
            <livewire:cart-index></livewire:cart-index>
        </div>


    </div>

@endsection
