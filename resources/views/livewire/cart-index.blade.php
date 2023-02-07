@if ($total != 0)
    <ul>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" style="width:25%"></th>
                    <th scope="col" style="width:25%">{{ __('home.productName') }}</th>
                    <th scope="col">{{ __('home.productDesc') }}</th>
                    <th scope="col">{{ __('home.productPrice') }}</th>
                    <th scope="col"></th>

                </tr>
            </thead>
            <tbody>
                @foreach ($data as $cart)
                    <tr>
                        <td><img src="{{ asset('storage/images/products/' . $cart->product->image) }}"
                                class="img-fluid rounded-start" style="width:85%" alt="{{ $cart->product->title }}"></td>
                        <td>{{ $cart->product->name }}</td>
                        <td>{{ Str::limit($cart->product->description, 70, $end = '...') }}</td>
                        <td>
                            <p class="card-text mb-0" style="font-weight: bold;">
                                {{ 'Rp' . number_format($cart->product->price, 2) }}
                            </p>
                        </td>
                        <td>
                            <button wire:click="destroy({{ $cart->id }})"class="btn " type="submit"><img
                                    src="{{ asset('storage/images/trash.png') }}"
                                    style="width: 20%"alt=""></button>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </ul>
    <hr>
    <div class="container d-flex mb-3">
        <h5 class="col-md-3 mt-2 ms-auto me-4">
            {{ __('home.totalCart') }} : {{ 'Rp' . number_format($total, 2) }}
        </h5>


        <div class="btn-cart">
            <a href="{{ route('checkoutCart', Auth::user()->id) }}"
                class="btn btn-cart"onclick="event.preventDefault(); document.getElementById('checkoutCart-{{ Auth::user()->id }}').submit()">{{ __('home.checkout') }}({{ $ctr }})
            </a>
            <form action="{{ route('checkoutCart', Auth::user()->id) }}" id="checkoutCart-{{ Auth::user()->id }}"
                class="d-none" method="POST">
                @csrf
                @method('POST')
            </form>
        </div>
    </div>
@else
    <div class="container">
        <div class="container">
            <div class="index-img text-center">
                <img src="{{ asset('storage/images/search.gif') }}" alt="" width="35%">
                <h1 style="color: #80d0c7;font-family: 'Viga', sans-serif;
            ">
                    {{ __('home.findSomething') }}
                </h1>
            </div>
        </div>
    </div>
@endif
