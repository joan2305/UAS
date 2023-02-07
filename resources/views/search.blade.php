@extends('layouts.app')
@section('style')
@endsection
@section('title', 'Amazing | ' . __('home.searchRes'))
@section('content')
    @guest
        <div class="container">
            <div class="index-img text-center">
                <img src="{{ asset('storage/images/vegetable.gif') }}" alt="" width="35%">
                <h1 style="color: #80d0c7;font-family: 'Viga', sans-serif;
            ">{{ __('home.welcome') }}
                </h1>
            </div>
        </div>
    @else
        @if (session('message'))
            <div class="toast-container position-fixed bottom-0 end-0 p-3">
                <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <i class="fa-solid fa-basket-shopping"></i>
                        <strong class="me-auto ms-2">Amazing</strong>
                        <small>{{ __('home.justNow') }}</small>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        {{ session('message') }}
                    </div>
                </div>
            </div>
        @endif
        <div class="container mt-4">
            <div class="row">
                <h2>{{ __('home.searchRes') }}</h2>
            </div>
            <div class="row mt-3">
                @foreach ($products as $product)
                    <div class="col-lg-3 col-md-4 mb-3 ">
                        <div class="product-box">
                            <div class="product-inner-box position-relative">
                                <div class="icons position-absolute">
                                    <a href="#" class="text-decoration-none text-dark" data-bs-container="body"
                                        data-bs-toggle="popover" data-bs-title="{{ __('home.grocer') }}" data-html="true"
                                        data-bs-trigger="focus" tabindex="0"data-bs-content={{ $product->grocer }}><i
                                            class="fa-solid fa-info"></i></a>
                                    <a href="{{ route('toDetailProduct', $product->id) }}"
                                        class="text-decoration-none text-dark"><i class="fas fa-eye"></i></a>
                                </div>
                                @if ($product->discount != 0)
                                    <div class="onsale">
                                        <span class="badge rounded-0"><i class="fa-solid fa-arrow-down-long"></i>
                                            {{ $product->discount }}% </span>
                                    </div>
                                @endif
                                <img src="{{ asset('storage/images/products/' . $product->image) }}" alt=""
                                    class="img-fluid">
                                <div class="card-btn">
                                    <a class="btn btn-white shadow-sm rounded-pill"href="{{ route('storeCart', $product->id) }}"
                                        onclick="event.preventDefault(); document.getElementById('storeCart-{{ $product->id }}').submit()"><i
                                            class="fa-solid fa-cart-shopping"></i>
                                        {{ __('home.add_to_cart') }}</a>
                                    <form action="{{ route('storeCart', $product->id) }}" id="storeCart-{{ $product->id }}"
                                        class="d-none" method="POST">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                            <div class="product-info mt-1">
                                <div class="product-name">
                                    <h3>{{ $product->name }}</h3>
                                </div>
                                @if ($product->discount != 0)
                                    <div class="product-price text-center">
                                        <span class="text-decoration-line-through me-1"
                                            style="color: red">{{ 'Rp' . number_format($product->originalPrice, 2) }}
                                        </span> <span>{{ 'Rp' . number_format($product->price, 2) }}</span>
                                    </div>
                                @else
                                    <div class="product-price text-center">
                                        <span>{{ 'Rp' . number_format($product->price, 2) }}</span>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="d-flex justify-content-center" style="margin: 2rem">
            {{-- paginate links here --}}
            {{ $products->links() }}
        </div>
    @endguest
@endsection
