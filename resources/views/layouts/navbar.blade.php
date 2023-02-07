<nav class="navbar navbar-expand-lg bg-body-tertiary navbar-dark"
    style="background-image: linear-gradient(15deg, #80d0c7 0%,  #486856 100%);">
    <div class="container">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @guest
            @else
                <form class="d-flex me-auto" role="search" method="POST" style="width: 30%"
                    action="{{ route('searchProduct') }}">
                    @csrf
                    <input class="form-control me-2" type="search" placeholder="{{ __('home.search') }}"
                        aria-label="Search" name="searchInput">
                    <button class="btn btn-search" type="submit">{{ __('home.search') }}</button>
                </form>
            @endguest
            <ul class="navbar-nav me-auto ms-auto">
                <li class="nav-item ">
                    <a class="nav-link text-large active" href="{{ route('home') }}"
                        style="color: #FFF;font-family: 'Viga', sans-serif; font-size: 20px">Amazing</a>
                </li>
            </ul>
            @guest
            @else
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('toCartIndex') }}">{{ __('home.cart') }}</a>
                    </li>
                    @if (Auth::user()->role == 'Admin')
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page"
                                href="{{ route('toMaintenanceIndex') }}">{{ __('home.acc_main') }}</a>
                        </li>
                    @endif
                    <li class="nav-item dropdown me-2">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">{{ Auth::user()->firstName }}</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('profileIndex') }}">{{ __('home.profile') }}</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form')
                                        .submit();">{{ __('home.logout') }}</a>
                            </li>
                            <form action="{{ route('logout') }}" id="logout-form" method="POST" class="d-none">
                                @csrf
                            </form>
                        </ul>
                    </li>

                </ul>
            @endguest
        </div>
    </div>
</nav>
<nav class="navbar navbar-expand-lg bg-body-tertiary " style="background-color: white !important;">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto me-auto mb-lg-0 log-reg">
                @guest
                    <li class="nav-item">
                        <a href="{{ route('loginIndex') }}" class="btn btn-custom">{{ __('home.login') }}</a>
                    </li>
                    <li class="nav-item ms-2">
                        <a href="{{ route('registerIndex') }}" class="btn btn-custom">{{ __('home.register') }}</a>
                    </li>
                @endguest
            </ul>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav text-black">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">

                        <span
                            class="flag-icon flag-icon-{{ Config::get('languages')[App::getLocale()]['flag-icon'] }}"></span>
                        {{ Config::get('languages')[App::getLocale()]['display'] }}
                    </a>
                    <ul class="dropdown-menu">
                        @foreach (Config::get('languages') as $lang => $language)
                            @if ($lang != App::getLocale())
                                <a class="dropdown-item" href="{{ route('switchLang', $lang) }}"><span
                                        class="flag-icon flag-icon-{{ $language['flag-icon'] }}"></span>
                                    {{ $language['display'] }}</a>
                            @endif
                        @endforeach
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
