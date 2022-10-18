<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Top</title>
<script src="{{ asset('js/app.js') }}" defer></script>
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<script src="https://kit.fontawesome.com/75e204f764.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="nav">
            <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top p-1">
                <a href="{{ url('home') }}" class="navbar-brand">SHOP HOME</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#responsiveMenuTop" aria-controls="responsiveMenuTop" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="responsiveMenuTop">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('home') }}">HOME</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="#">CONTACT</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <form class="form-inline ml-auto">
                            <label class="sr-only" for="keyword">SERCH</label>
                            <input type="search" class="form-control form-control-sm mr-2" placeholder="SEARCH" id="keyword">
                            <button type="submit" class="btn btn-light btn-sm mr-5">SEARCH</button>
                        </form>
                        
                        <li class="nav-item"><a class="nav-link" href="{{ url('home/cart') }}"><i class="fa-solid fa-cart-shopping"></i> {{ Cart::getTotalQuantity()}}</a>
                        </li>

                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item ml-3">
                            <a class="nav-link" href="{{ route('login') }}">LOG IN</a>
                        </li>
                        @endif
                        <!-- @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif -->
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                            
                    </ul>
                </div>
            </nav>
        </div>

        <div class="nav">
            <nav class="navbar navbar-expand-md navbar-light bg-light fixed-bottom">
               <a href="{{ url('home') }}" class="navbar-brand h1">HOME</a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#responsiveMenu" aria-controls="responsiveMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="responsiveMenu">
                    <div class="navbar-nav">
                        @foreach($types as $type)
                        <a class="nav-item nav-link h4" href="{{ url('home/'.$type->id.'/index') }}">{{ $type->name }}</a>
                        @endforeach
                    </div>
                </div>
            </nav>
        </div>
    </div>
@yield('content')
</body>
</html>