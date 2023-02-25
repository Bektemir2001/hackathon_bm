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
    <link rel="stylesheet" href="{{asset('css/hamburgers.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/flag.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <title>@lang('lang.islamic_institute')</title>
  </head>
  <body>
    <div class="wrapper">
        <div class="top-header">
            <div class="container-lg top-header__list">

            <div class="logo-top">
            <img src="assets/logo.png" alt="">
          </div>
          <p>@lang('lang.banner_title')</p>
          <div class="top-header__number">
            <h5><a href="tel: +996708198625">+996 708 19 86 25</a></h5>
          </div>
              @if (auth()->user())
              <div class="auth-user">
                {{-- test --}}
                  @if(count(auth()->user()->accessTest))
                    @include('includes.test_for_students_with_mob')
                  @else

                {{-- test --}}
                <button class="header__authorization__btn" id="dropdownMenuButton1" type="button" data-bs-toggle="dropdown" aria-expanded="false">Профиль</button>
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
                @endif
              </div>
              @else
              <div class="auth-user"><a class="header__signUp me-2" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3">@lang('lang.login')</a>
                <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content">
                      <div class="modal-header"><span aria-hidden="true" data-bs-dismiss="modal" aria-label="Close">&times;</span></div>
                      <div class="modal-body">
                        <div class="auth-body">
                          <form class="auth-form" action="{{route('login')}}" method="POST">
                            @csrf
                            <h5 class="mb-3">Вход</h5>
                            <div class="mb-3">
                              <input name="email" class="form-control" id="exampleInputEmail6" type="email" aria-describedby="emailHelp" placeholder="Логин(Введите электронную почту)" required autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')">
                            </div>
                            <div class="mb-3">
                              <input name="name" class="form-control" id="exampleInputPassword1" type="password" placeholder="Пароль" required autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')">
                            </div>
                            <div class="autBtn">
                              <button class="btnSignIn" type="submit">Войти  </button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div><a class="header__signIn me-2" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2">@lang('lang.registration')</a>
                <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content">
                      <div class="modal-header"><span aria-hidden="true" data-bs-dismiss="modal" aria-label="Close">&times;</span></div>
                      <div class="modal-body">
                        <div class="auth-body mt-5">
                          <form class="auth-form" action="{{route('main.register')}}" method="POST">
                            @csrf
                            <h5 class="mb-3">Регистрация</h5>
                            <div class="mb-3">
                              <input name="email" class="form-control" id="exampleInputEmail7" type="email" aria-describedby="emailHelp" placeholder="Введите электронную почту" required autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')">
                            </div>
                            <div class="mb-3">
                              <input name="password" class="form-control" id="exampleInputPassword2" type="password" placeholder="Придумайте пароль" required autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')">
                            </div>
                            <div class="mb-3">
                              <input name="name" class="form-control" id="exampleInputEmail8" type="text" aria-describedby="emailHelp" placeholder="Имя" required autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')">
                            </div>
                            <div class="mb-3">
                              <input name="surname" class="form-control" id="exampleInputEmail9" type="text" aria-describedby="emailHelp" placeholder="Фамилия" required autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')">
                            </div>

                            <div class="mb-3">
                                {!! NoCaptcha::renderJs() !!}
                                {!! NoCaptcha::renderJs('ru', true, 'recaptchaCallback') !!}
                                {!! NoCaptcha::display() !!}
                              </div>
                            <div class="autBtn">
                              <button class="btnSignIn" type="submit">Зарегистрироваться    </button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @endif
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

                    <div class="header__top__number">
                      <h5>+996 708 19 86 25</h5>
                    </div>
                  </div>
                  <div class="header__linksBlock">
                    <li><a class="header__nav-link" href="{{route('index')}}">@lang('lang.main')</a></li>


              <li><a class="header__nav-link" href="{{route('about')}}">@lang('lang.about')</a></li>
              <li><a class="header__nav-link" href="{{route('how.to.proceed')}}">@lang('lang.enroll')</a></li>
                    <li><a class="header__nav-link" href="{{route('contact')}}">@lang('lang.contact')</a></li>
                    <li><a class="header__nav-link" href="{{route('study')}}">@lang('lang.education')</a></li>
                    @if(auth()->user())
                        @if(auth()->user()->gender === 'male')
                            <li><a class="header__nav-link" href="{{route('male')}}">@lang('lang.man')</a></li>
                        @else
                            <li><a class="header__nav-link" href="{{route('woman')}}">@lang('lang.woman')</a></li>
                        @endif
                    @endif
                    <li><a class="header__nav-link" href="{{route('tax')}}">Закят</a></li>
                    <li><a class="header__nav-link" href="{{route('devouring')}}">@lang('lang.donation')</a></li>
                    <li><a class="header__nav-link" href="{{route('pozh')}}">@lang('lang.kurmandik')</a></li>
                  </div>

                </div>
              </div>
            </div>
          </div>
        @if (session('notification') == 'auth')
        <a class="d-none" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" id="auth"></a>
        @endif
        @if(session('notification') == 'ErrorWithAuthentication')
        <a class="d-none" href="#" data-bs-toggle="modal" data-bs-target="#exampleModalAuth" id="authError"></a>
        <div class="d-none">
            {{session()->forget('notification')}}
        </div>
        <div class="modal fade" id="exampleModalAuth" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
              <div class="modal-content">
                <div class="modal-header"><span aria-hidden="true" data-bs-dismiss="modal" aria-label="Close">&times;</span></div>
                <div class="modal-body">
                  <div class="auth-body">
                    <form class="auth-form" action="{{route('login')}}" method="POST">
                        @csrf
                      <h5 class="mb-3">Вход</h5>
                      <div class="mb-3">
                        <input class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" name="email" type="email" aria-describedby="emailHelp" placeholder="Логин(Введите электронную почту)" value="{{old('email')}}" required autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')">
                      </div>
                      <div class="mb-3">
                        <input class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" name="password" type="password" placeholder="Пароль" value="{{old('password')}}" required autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')">
                      </div>
                      <div class="mb-3">
                        <p class="text-danger">Адрес электронной почты и/или пароль, которые вы указали, неверны.</p>
                      </div>
                      <div class="autBtn">
                        <button class="btnSignIn" type="submit">Войти</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>

        @endif
        {{-- @if(session('notification'))
        @dd(session('notification'))
        @endif --}}
        @if (session('notification') == 'ErrrorWithRegistration')
        <a class="d-none" href="#" data-bs-toggle="modal" data-bs-target="#exampleModalReg" id="registerError"></a>
        <div class="d-none">
            {{session()->forget('notification')}}
        </div>
        <div class="modal fade" id="exampleModalReg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
              <div class="modal-content">
                <div class="modal-header"><span aria-hidden="true" data-bs-dismiss="modal" aria-label="Close">&times;</span></div>
                <div class="modal-body">
                  <div class="auth-body">
                    <form class="auth-form" action="{{route('main.register')}}" method="POST">
                        @csrf
                      <h5 class="mb-3">Регистрация</h5>
                      <div class="mb-3">
                        <input class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" name="email" type="email" aria-describedby="emailHelp" placeholder="Введите электронную почту" value="{{old('email')}}" required autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')">
                        @error('email')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <input class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" name="password" type="password" placeholder="Придумайте пароль" value="{{old('password')}}" required autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')">
                        @error('password')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <input class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" name="name" type="text" aria-describedby="emailHelp" placeholder="Имя" value="{{old('name')}}" required autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')">
                        @error('name')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <input class="form-control @error('surname') is-invalid @enderror" id="exampleInputEmail1" name="surname" type="text" aria-describedby="emailHelp" placeholder="Фамилия" value="{{old('surname')}}" required autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninvalid="this.setCustomValidity('')">
                        @error('surname')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                      </div>
                      <div class="mb-3">
                        {!! NoCaptcha::renderJs('fr', true, 'recaptchaCallback') !!}
                        {!! NoCaptcha::display() !!}
                        @if ($errors->has('g-recaptcha-response'))
                            <span class="help-block">
                                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                            </span>
                        @endif
                      </div>
                      <div class="autBtn">
                        <button class="btnSignIn" type="submit">Зарегистрироваться</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endif
      @yield('content')

      <footer class="footer">
        <div class="container-lg">
          <div class="footer__info">
            <h5 class="footer__info__title">@lang('lang.slogan')</h5>
            <div class="footer__info__social"><a class="social-site" href="#"><i class="fa-brands fa-instagram"></i></a><a class="social-site" href="#"><i class="fa-brands fa-twitter"></i></a><a class="social-site" href="#"><i class="fa-brands fa-vk"></i></a><a class="social-site" href="#"><i class="fa-brands fa-telegram"></i></a></div>
            <div class="footer__info__bottom__text">
              <p>© 2021 - 2022 @lang('lang.banner_title')</p>
            </div>
          </div>
        </div>
      </footer>
    </div>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
    async defer>
</script>
<script type="text/javascript" src="http://goo.gl/6NKAN"></script>
<script type="text/javascript">
    var onloadCallback = function() {
      console.log("grecaptcha is ready!");
    };
    var recaptchaCallback = function() {
      console.log("grecaptcha is ready!");
    };
  </script>

    <script src="{{asset('js/main.js')}}"></script>
    <script>
        var href_this_page = "{{route('index')}}"+"/";

        var auth = document.getElementById('auth');
        var authError = document.getElementById('authError');
        var registerError = document.getElementById('registerError');
        var applicationError = document.getElementById('applicationError');

        if(applicationError){
            applicationError.click();
        }
        if(authError){
            authError.click();
        }
        if(registerError){
            registerError.click();
        }
        if(auth){
            auth.click();
        }
    </script>
    </body>
  </html>

