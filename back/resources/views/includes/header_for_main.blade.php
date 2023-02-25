
<header id="header-bg">
    <div class="header container-lg">
      <nav class="navbar">
        <ul class="header__nav-item">
            <li><a class="header__nav-link" href="{{route('index')}}">@lang('lang.main')</a></li>
            <li class="nav-item dropdown"><a class="nav-link link-drop dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">@lang('lang.aboutschool')</a>
                <ul class="drop-menu dropdown-menu">

                  <li><a class="dropdown-item drop-menu__list" href="{{route('about')}}">@lang('lang.about')</a></li>
                  <li><a class="dropdown-item drop-menu__list" href="{{route('how.to.proceed')}}">@lang('lang.enroll')</a></li>
                </ul>
              </li>
            <li><a class="header__nav-link" href="{{route('contact')}}">@lang('lang.contact')</a></li>
            <li><a class="header__nav-link" href="{{route('study')}}">@lang('lang.education')</a></li>
            @if(auth()->user())
                @if(auth()->user()->gender === 'male')
                <li><a class="header__nav-link" href="{{route('male')}}">@lang('lang.man')</a></li>
                @else
                <li><a class="header__nav-link" href="{{route('woman')}}">@lang('lang.woman')</a></li>
                @endif
            @endif
            <li class="nav-item dropdown"><a class="nav-link link-drop dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">@lang('lang.donation')</a>
                <ul class="drop-menu dropdown-menu">
                  <li><a class="dropdown-item drop-menu__list" href="{{route('tax')}}">Закет</a></li>
                  <li><a class="dropdown-item drop-menu__list" href="{{route('devouring')}}">@lang('lang.donation')</a></li>
                  <li><a class="dropdown-item drop-menu__list" href="{{route('pozh')}}">@lang('lang.kurmandik')</a></li>

                </ul>
              </li>
        </ul>
      </nav>
      @if(auth()->user())
      <nav class="header__authorization">

{{-- test --}}
        @if(count(auth()->user()->accessTest))
            @include('includes.test_for_stundents')
        @else

{{-- test --}}


          <button class="header__authorization__btn" id="dropdownMenuButton1" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-user"> Профиль</i></button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="{{route('profil')}}">@lang('lang.profile')</a></li>
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
      </nav>
    @else
    <nav class="header__authorization-header">
      <a class="header__authorization-header__signUp me-2" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">@lang('lang.login')</a>
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
          <div class="modal-content">
            <div class="modal-header"><span aria-hidden="true" data-bs-dismiss="modal" aria-label="Close">&times;</span></div>
            <div class="modal-body">
              <div class="auth-body">
                <form class="auth-form" action="{{route('login')}}" method="POST">
                    @csrf
                  <h5 class="mb-3">@lang('lang.login')</h5>
                  <div class="mb-3">
                    <input class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail4" name="email" type="email" aria-describedby="emailHelp" placeholder="@lang('lang.email')" required autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')">
                  </div>
                  <div class="mb-3">
                    <input class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword5" name="password" type="password" placeholder="Пароль" required autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')">
                  </div>
                  <div class="autBtn">
                    <button class="btnSignIn" type="submit">@lang('lang.login')</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <a class="header__authorization-header__signIn" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal1">@lang('lang.registration')</a>
      <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
          <div class="modal-content">
            <div class="modal-header"><span aria-hidden="true" data-bs-dismiss="modal" aria-label="Close">&times;</span></div>
            <div class="modal-body">
              <div class="auth-body">
                <form class="auth-form" action="{{route('main.register')}}" method="POST">
                    @csrf
                  <h5 class="mb-3">@lang('lang.registration')</h5>
                  <div class="mb-3">
                    <input class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" name="email" type="email" aria-describedby="emailHelp" placeholder="@lang('lang.email')" required autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')">
                  </div>
                  <div class="mb-3">
                    <input class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword3" name="password" type="password" placeholder="Пароль" required autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')">
                  </div>
                  <div class="mb-3">
                    <input class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail2" name="name" type="text" aria-describedby="emailHelp" placeholder="Имя" required autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')">
                  </div>
                  <div class="mb-3">
                    <input class="form-control @error('surname') is-invalid @enderror" id="exampleInputEmail3" name="surname" type="text" aria-describedby="emailHelp" placeholder="Фамилия" required autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')">
                  </div>
                  <div class="mb-3">
                    {!! NoCaptcha::renderJs() !!}
                    {!! NoCaptcha::display() !!}
                  </div>
                  <div class="autBtn">
                    <button class="btnSignIn" type="submit">@lang('lang.registration')</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
    @endif
    </div>
</header>
