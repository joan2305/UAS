@extends('layouts.app')

@section('title', 'Amazing | ' . $product->name)

@section('content')

    <div class="container mt-5 d-flex">
        <div class="img-fluid col-md-5">
            <img src="{{ asset('storage/images/products/' . $product->image) }}" alt="" class="img-fluid">
        </div>
        <div class="product-detail col-md-6 ms-auto">
            <div class="text-large">
                <h1>{{ $product->name }}</h1>
            </div>
            <div class="text mt-3">
                @if ($product->discount != 0)
                    <h5>{{ __('home.discount') }} : {{ $product->discount }}%</h5>
                    <span class="text-decoration-line-through me-1"
                        style="color: red">{{ 'Rp' . number_format($product->originalPrice, 2) }}
                    </span> <span>{{ 'Rp' . number_format($product->price, 2) }}</span>
                @else
                    <span>{{ 'Rp' . number_format($product->price, 2) }}</span>
                @endif
            </div>

            <div class="accordion accordion-flush mt-3" id="accordionFlushExample">
                <div class="accordion-item" style="background-color: #c3ddd7 !important;">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne"
                            style="background-color: white; border: 1px solid black;">
                            {{ __('home.description') }}
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">{{ $product->description }}</div>
                    </div>
                </div>
            </div>
            <div class="btn-cart">
                <a href="{{ route('storeCart', $product->id) }}"
                    onclick="event.preventDefault(); document.getElementById('storeCart-{{ $product->id }}').submit()"class="btn btn-cart mt-3">{{ __('home.add_to_cart') }}</a>

                <form action="{{ route('storeCart', $product->id) }}" id="storeCart-{{ $product->id }}" class="d-none"
                    method="POST">
                    @csrf
                </form>
            </div>

        </div>
    </div>
@endsection
