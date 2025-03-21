<div class="navbar-bg"></div>

<nav class="navbar navbar-expand-lg main-navbar">
    <div class="form-inline mr-auto"></div>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown">

            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <div class="d-sm-none d-lg-inline-block">
                    <img alt="image" src="{{ asset(auth()->user()->avatar) }}" class="rounded-circle mr-1">
                    {{ __('Hola') }}, {{ Auth::user()->name }}
                </div>
            </a>

            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">Logged in 5 min ago</div>

                {{-- Perfil --}}
                <a href="{{ route('profile.edit') }}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i>&nbsp; {{ __('Perfil') }}
                </a>

                {{-- Configuraciones --}}
                <a href="{{ route('profile.actividades.index') }}" class="dropdown-item has-icon">
                    <i class="bi bi-lightning"></i>&nbsp;{{ __('Actividades') }}
                </a>

                {{-- Linea divisoria --}}
                <div class="dropdown-divider"></div>

                {{-- Logout --}}
                <a href="{{ route('profile.logoutPage.index') }}" class="dropdown-item">
                    <i class="bi bi-escape"></i>&nbsp;
                    {{ __('Log Out') }}
                </a>
                {{-- <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="#" class="dropdown-item has-icon text-danger" onclick="event.preventDefault(); this.closest('form').submit();">
                        <i class="fas fa-sign-out-alt"></i> {{ __('Cerrar Sesión') }}
                    </a>
                </form> --}}


            </div>
        </li>
    </ul>
</nav>