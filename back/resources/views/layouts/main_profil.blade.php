<?php 
  $l = request()->segment(1, '');
  $lang = url()->current();
  $k = Route::current()->uri;

  $langru = "";
  $langkg = "";
  if($l == "ru"){
    $langru = $lang;
    $langkg = str_replace("/ru", "", $lang);
  }
  else if($l == ""){
    $langru = $lang.'/ru';
    $langkg = $lang;
  }
  else{
    $langru = str_replace($k, "ru/".$k, $lang);
    $langkg = $lang;
  }
                                
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/flag.css')}}">

    <link rel="stylesheet" href="{{asset('css/hamburgers.css')}}">
    <title>Исламский институт</title>
  </head>
  <body></body>
  <div class="wrapper">
    <div class="top-header">
      <div class="container-lg top-header__list">
        <div class="top-header__social"><a class="social-site" href="#"><i class="fa-brands fa-instagram"></i></a><a class="social-site" href="#"><i class="fa-brands fa-twitter"></i></a><a class="social-site" href="#"><i class="fa-brands fa-vk"></i></a><a class="social-site" href="#"><i class="fa-brands fa-telegram"></i></a></div>
        <div class="top-header__logo"> <a class="navbar-brand" href="index.html"><i class="fa-solid fa-moon"></i></a></div>
        <div class="top-header__number">
          <h5><a href="tel:+996708198625">+996 708 19 86 25</a></h5>
        </div>
        <div class="auth-user">
          <button class="header__authorization__btn" id="dropdownMenuButton1" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-user">Профиль</i> </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="{{route('profil')}}">Профиль</a></li>
            <li>
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    Выйти
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
          </ul>
        </div>
        <div>
                <div class="dropdown">
                  @if(url()->current() == $langru)
                  <div class="dropbtnru text-white">RU</div>
                  @else
                  <div class="dropbtnkg text-white">KG</div>
                  @endif
                  <div class="dropdown-content">
                    <a href="{{ $langru }}">RU</a>
                    <a href="{{ $langkg }}">KG</a>
                  </div>
                </div>
              </div>
        <div class="header__hamburgerMenu" onClick="toggleMenu()">
          <button class="hamburger hamburger--spring" type="button"><span class="hamburger-box"><span class="hamburger-inner"></span></span></button>
          <div class="header__dropMenu">
            <div class="header__top">
              <div class="header__top__social"><a class="social-site" href="#"><i class="fa-brands fa-instagram"></i></a><a class="social-site" href="#"><i class="fa-brands fa-twitter"></i></a><a class="social-site" href="#"><i class="fa-brands fa-vk"></i></a><a class="social-site" href="#"><i class="fa-brands fa-telegram"></i></a></div>
              <div class="header__top__logo"> <a class="navbar-brand" href="index.html"><i class="fa-solid fa-moon"></i></a></div>
              <div class="header__top__number">
                <h5>+996 708 19 86 25</h5>
              </div>
            </div>
            @if(count(auth()->user()->student))
            <div class="header__linksBlock">
              <li><a class="header__nav-link" href="{{route('semester')}}">Семестр</a></li>
              <li><a class="header__nav-link" href="{{route('user_items')}}">Обучение</a></li>
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>

    <section class="section__banner">
        <header id="header-bg">
          <div class="header container-lg">
            @if(count(auth()->user()->student))
            <nav class="navbar">
              <ul class="header__nav-item">
                <li><a class="header__nav-link" href="{{route('semester')}}">Семестр</a></li>
                <li><a class="header__nav-link" href="{{route('user_items')}}">Обучение</a></li>
              </ul>
            </nav>
            @else
            <nav class="navbar">
              <ul class="header__nav-item">
                <li></li>
                <li></li>
              </ul>
            </nav>
            @endif
            <nav class="header__authorization">
              <button class="header__authorization__btn" id="dropdownMenuButton1" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-user"></i></button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="{{route('profil')}}">Профиль</a></li>
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        Выйти
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
              </ul>
            </nav>
          </div>
        </header>

    @yield('content')
    </section>
    <footer class="footer">
        <div class="container-lg">
          <div class="footer__info">
            <h5 class="footer__info__title">МИР ВАМ И БЛАГОСЛОВЕНИЕ ВСЕВЫШНЕГО!</h5>
            <div class="footer__info__social"><a class="social-site" href="#"><i class="fa-brands fa-instagram"></i></a><a class="social-site" href="#"><i class="fa-brands fa-twitter"></i></a><a class="social-site" href="#"><i class="fa-brands fa-vk"></i></a><a class="social-site" href="#"><i class="fa-brands fa-telegram"></i></a></div>
            <div class="footer__info__bottom__text">
              <p>© 2021 - 2022 Исламский институт  имени “Расула-Акрама”</p>
            </div>
          </div>
        </div>
      </footer>
</div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="{{asset('js/main.js')}}"></script>

</html>
