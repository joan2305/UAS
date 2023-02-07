@if ($data->count() != 0)
    <ul>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" style="width: 40%">{{ __('home.account') }}</th>
                    <th scope="col">{{ __('home.action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $user)
                    <tr>
                        <td>{{ $user->firstName }} {{ $user->lastName }} - {{ $user->role }}</td>
                        <td>
                            <a href="{{ route('toUpdateRole', $user->id) }}" class="btn" style="width:10%"
                                type="submit"><img src="{{ asset('storage/images/edit.png') }}"
                                    style="width: 65%"alt=""></a>
                            <button wire:click="destroy({{ $user->id }})"style="width:10%"class="btn "
                                type="submit"><img src="{{ asset('storage/images/trash.png') }}"
                                    style="width: 65%"alt=""></button>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </ul>
@else
    <div class="container">
        <div class="container">
            <div class="index-img text-center">
                <img src="{{ asset('storage/images/empty.gif') }}" alt="" width="35%">
                <h1 style="color: #80d0c7;font-family: 'Viga', sans-serif;
        ">
                    {{ __('home.emptyAcc') }}
                </h1>
            </div>
        </div>
    </div>
@endif
