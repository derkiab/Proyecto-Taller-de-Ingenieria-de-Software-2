<nav class="navbar navbar-expand-md navbar-light shadow-sm" id="nav_header">
    <div class="container-fluid">
        <ul class="navbar-nav me-auto">
            @guest
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            @else
            <a class="navbar-brand text-white" class="nav-link" id="sidebarCollapse" href="#">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </a>
            <a href="" class="navbar-brand has-logo" id="yui_3_17_2_1_1682450189389_40">
                <span class="logo d-none d-sm-inline" id="yui_3_17_2_1_1682450189389_39">
                    <img src="{{ asset('images/logo.png') }}" title="Landes" alt="Landes" id="logo_ini">
                </span>
            </a>

            @endguest
        </ul>
        <ul class="navbar-nav ms-auto">
            <!-- Authentication Links -->
            @guest
            @if (Route::has('login'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @endif
            @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <div class="photo">
                        <img src="/imagen/{{ Auth::user()->image }}" id="logout" >
                    </div>

                </a>


                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <p id="user_name"> {{ Auth::user()->name }}</p>
                    <hr>

                    <a class="dropdown-item" href="" onclick="event.preventDefault();
                        document.getElementById('profile-form').submit();">
                        {{ __('Perfil') }}
                    </a>
                    <form id="profile-form" action="" method="POST" class="d-none">
                        @csrf
                    </form>


                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Cerrar Sesión') }}
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
