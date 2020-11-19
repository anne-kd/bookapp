<!DOCTYPE html>
<html>
<head>
    <title>Buch-App: Lieblingsbücher</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;500&display=swap" rel="stylesheet">
    <style>
        html,body{font-family:'Roboto',sans-serif;font-weight:300;margin:0;padding:0}
        header{position:fixed;top:0;left:0;padding:0;width:100%;z-index:100;-webkit-box-shadow:0 -11px 90px -8px rgba(0,0,0,0.71);-moz-box-shadow:0 -11px 90px -8px rgba(0,0,0,0.71);box-shadow:0 -11px 90px -8px rgba(0,0,0,0.71)}
        .content{margin-top:150px}
        .wrapper{margin:0 auto;padding:0}
        .post{height:auto;background-color:#eee;margin:50px 0;padding:20px}
        .post .header{display:flex;justify-content:space-between}
        .post .row{margin-top:20px}
        .headline{margin:0;display:flex;font-weight:500;justify-content:space-between}
        .add,.date{display:inline-block;float:right}
        .add::after,.date::after{clear:both}
        .name{margin:0;padding-bottom:10px;font-weight:500}
        .comments{margin:20px 0;padding:10px;min-height:100px;background-color:#fff}
        .comment{margin-top:10px;padding-top:4px;border-top:solid .5px #000}
        img{position:relative;display:block;height:350px;object-fit:cover}
        .pull-right{position:relative;display:inline-block;left:20px}
        nav, .navbar, .navbar-expand-lg {display:flex;justify-content:space-between}
        .navcontainer{display:flex; flex-direction:row}
    </style>
</head>

<body>
  
    <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="">Zusammenfassung zu Lieblingsbüchern</a>
                <div class="navcontainer">
                @guest
                    @if (Route::has('login'))
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    @endif
                            
                    @if (Route::has('register'))
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                    @else
                        <a class="nav-link" href="{{ route('books.create') }}">Neue Zusammenfassung</a>
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>        
                @endguest
                </div>
            </nav>
    </header>

    <div class="container content">
        @yield('content')
    </div>
    
</body>

</html>
