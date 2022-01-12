<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>home</title>

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">


{{--    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"--}}
{{--            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"--}}
{{--            crossorigin="anonymous">--}}
{{--    </script>--}}

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
            crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
            integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
            integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj"
            crossorigin="anonymous"></script>


    <link rel="stylesheet" href="{{asset('styles/style.css?version=1')}}" >

</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark bg-black ">
    <a class="navbar-brand" href="{{route('home')}}"><img src="images/logo.png" alt="logo"></a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse primary-navigation me-auto" id="navbarNavDropdown">
        <ul class="navbar-nav ">

            @if(Route::is('home'))
                <li class="nav-item active">

                    <a class="nav-link" href="{{route('home')}}">Domov<span class="sr-only">(current)</span></a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home')}}">Domov<span class="sr-only">(current)</span></a>
                </li>
            @endif

            @if(Route::is('contact'))
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('contact')}}">Kontakt</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{route('contact')}}">Kontakt</a>
                </li>
            @endif

            @if(Route::is('hoodie') || Route::is('shirt') || Route::is('cap') || Route::is('accessories'))
                <li class="nav-item active dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        E-SHOP
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{route('hoodie')}}">Mikiny</a>
                        <a class="dropdown-item" href="{{route('shirt')}}">Tričká</a>
                        <a class="dropdown-item" href="{{route('cap')}}">Šiltovky</a>
                        <a class="dropdown-item" href="{{route('accessories')}}">Kľúčenky</a>
                    </div>
                </li>
            @else
                <li class="nav-item  dropdown">
                    <a class="nav-link dropdown-toggle" href="#"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        E-SHOP
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{route('hoodie')}}">Mikiny</a>
                        <a class="dropdown-item" href="{{route('shirt')}}">Tričká</a>
                        <a class="dropdown-item" href="{{route('cap')}}">Šiltovky</a>
                        <a class="dropdown-item" href="{{route('accessories')}}">Kľúčenky</a>
                    </div>
                </li>
            @endif

            @if(Auth::check())
                    <li class="nav-item" >
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="nav-item">
                            @csrf
                            <a class="nav-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();"> Logout</a>
                        </form>
                    </li>


                @else
                    <li class="nav-item" >
                        <a class="nav-link" href="{{route('login')}}">Login</a>
                    </li>

                    <li class="nav-item" >
                        <a class="nav-link" href="{{route('registration')}}">Sign</a>
                    </li>

                @endif



        </ul>
    </div>
</nav>

<main class="view">
    @yield('content')
</main>
</body>

</html>
