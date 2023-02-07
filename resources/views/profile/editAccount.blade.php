@extends('layouts.app')
@section('title', 'Amazing | ' . __('home.acc_main'))

@section('content')
    @if (session('success'))
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <i class="fa-solid fa-basket-shopping"></i>
                    <strong class="me-auto ms-2">Amazing</strong>
                    <small>Just now</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{ __('home.updateRoleSuc') }}
                </div>
            </div>
        </div>
    @endif
    <div class="container">
        <livewire:account-index></livewire:account-index>
    </div>
@endsection
