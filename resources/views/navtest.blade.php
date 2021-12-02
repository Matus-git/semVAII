<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>home</title>

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="styles/navbar.css" >

</head>
<body>
      <div>
          <nav class="navbar">
              <div >
                  <div>
                      <a href="">
                          <img src="images/logo.png" alt="logo">
                      </a>
                  </div>

                  <li class="dropdown icon">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          MENU
                      </a>
                      <div class="dropdown-menu  icon-text" aria-labelledby="navbarDropdownMenuLink">
                          <a class="dropdown-item" href="{{route('hoodie')}}">Mikiny</a>
                          <a class="dropdown-item" href="{{route('shirt')}}">Tričká</a>
                          <a class="dropdown-item" href="{{route('cap')}}">Šiltovky</a>
                          <a class="dropdown-item" href="{{route('accessories')}}">Kľúčenky</a>
                      </div>
                  </li>

                  <div class="nav-links">
                      <ul class="links" id="myTopnav">
                          <li><a href="">Domov</a></li>
                          <li><a href="">Kontakt</a></li>
                          <li><a href="">E-Shop</a>
                              <i class='bx bxs-chevron-down arrow'></i>
                              <ul class="drop sub-menu">
                                  <li><a href="{{route('hoodie')}}">Mikiny</a></li>
                                  <li><a href="{{route('shirt')}}">Tričká</a></li>
                                  <li><a href="{{route('cap')}}">Šiltovky</a></li>
                                  <li><a href="{{route('accessories')}}">Kľúčenky</a></li>
                              </ul>
                          </li>
                      </ul>
                  </div>
              </div>
          </nav>
      </div>

        <main class="view">
            @yield('nav')
        </main>
</body>
</html>
