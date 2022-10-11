<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Top</title>
<script src="{{ asset('js/app.js') }}" defer></script>
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="nav">
            <nav class="navbar navbar-expand-sm navbar-light bg-light fixed-top p-1">
                <a href="{{ url('home') }}" class="navbar-brand">SHOP HOME</a>
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
                        <input type="search" class="form-control form-control-sm mr-2" placeholder="SERCH" id="keyword">
                        <button type="submit" class="btn btn-light btn-sm">SERCH</button>
                    </form>
                    <li class="nav-item ml-3">
                        <a class="nav-link" href="#">LOG IN</a>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="nav">
            <nav class="navbar navbar-expand-sm navbar-light bg-light fixed-bottom justify-content-center">
               <a href="{{ url('home') }}" class="navbar-brand h1">HOME</a>
               <div class="navbar-nav">
                @foreach($types as $type)
                   <a class="nav-item nav-link h4" href="{{ url('home/'.$type->id.'/index') }}">{{ $type->name }}</a>
                @endforeach
               </div>
            </nav>
        </div>
    </div>
@yield('content')
</body>
</html>