@props(['styles' => ''])
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('styles')
    <!-- Temporary style -->
    <style>
        body {}

        .form-control:focus {
            box-shadow: none;

        }

        .profile-button {
            box-shadow: none;
            border: none
        }

        .profile-button:hover {}

        .profile-button:focus {

            box-shadow: none
        }

        .profile-button:active {

            box-shadow: none
        }

        .back:hover {

            cursor: pointer
        }

        .labels {
            font-size: 11px
        }

        .add-experience:hover {

            color: #fff;
            cursor: pointer;

        }

        footer {

            position:relative;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <i class="fa-solid fa-music"></i>
                    {{ __('translation.home.shortcut') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <a class="navbar-brand px-lg-1" href="{{ url('/') }}">
                            {{ __('translation.dashboard.main') }}
                        </a>

                        <a class="navbar-brand px-lg-1" href="{{ route('orchesterreview') }}">
                            {{ __('translation.dashboard.review') }}
                        </a>

                        <a class="navbar-brand px-lg-1" href="{{ route('orchesterreviewended') }}">
                            {{ __('translation.dashboard.endreview') }}
                        </a>

                        <a class="navbar-brand px-lg-1" href="{{ route('orchesterreviewcanceled') }}">
                            {{ __('translation.dashboard.cancelreview') }}
                        </a>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        @Auth
                        @role('user')
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" style="color: #fff"
                                    aria-expanded="false">
                                    {{ __('translation.dashboard.myreview') }}
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ url('/myReviews') }}">Zarządzaj</a></li>
                                    <li><a class="dropdown-item"
                                            href="{{ route('orchesterreviewAdd') }}">{{ __('translation.dashboard.reviewadd') }}</a>
                                    </li>
                                    {{-- <li><a class="dropdown-item" href="#"></a></li> --}}
                                </ul>
                            </li>
                            @endrole
                            @role('jury')
                            <a class="navbar-brand px-lg-1" href="{{ route('juryInReviewsIndex') }}">
                                {{ __('translation.dashboard.rate') }}
                            </a>
                            @endrole
                            <a class="navbar-brand mx-2" href="{{ route('profile') }}">
                                <i class="fa-regular fa-user"></i>
                                {{ __('translation.dashboard.profile') }}
                            </a>
                        @endAuth
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link"
                                        href="{{ route('login') }}">{{ __('translation.login.login') }}</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link"
                                        href="{{ route('register') }}">{{ __('translation.register.register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>

                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{ __('translation.login.logout') }}
                                        </a>
                                    </li>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <x-toasts />

        <main class="">
            @yield('content')
        </main>
    </div>
    <footer class="bg-dark text-light">
        <p class="py-3 mb-0 text-center">&copy; 2023 Dudek Łukasz</p>

    </footer>
</body>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    var toastElList = [].slice.call(document.querySelectorAll('.toast'))
    var toastList = toastElList.map(function(toastEl) {
        return new bootstrap.Toast(toastEl)
    })
    toastList.forEach(toast => toast.show())
</script>

@stack('scripts')

</html>
