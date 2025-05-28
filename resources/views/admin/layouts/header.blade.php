<div class="navbar-bg"></div>

<nav class="navbar navbar-expand-lg main-navbar">

    <!-- Navbar Toggle Sidebar -->
    <div class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li>
                <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg">
                    <i class="fas fa-bars"></i>
                </a>
            </li>
            <li>
                <a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none">
                    <i class="fas fa-search"></i>
                </a>
            </li>
        </ul>
    </div>

    <!-- Navbar Right -->
    <ul class="navbar-nav navbar-right">
        <li class="dropdown">

            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user" aria-expanded="false">

                <img alt="image" src="{{ asset( !empty(auth()->user()->avatar) ? auth()->user()->avatar : url('images/avatar.png') ) }}" class="avatar avatar-sm mr-1">

                <div class="d-sm-none d-lg-inline-block">
                    {{ __('Hola') }}, {{ Auth::user()->name }}
                </div>

            </a>

            <div class="dropdown-menu dropdown-menu-right">

                @php
                    // leer login_time de tabla log_times
                    $loginTime = \App\Models\LogTime::where('user_id', auth()->user()->id)->latest()->first();
                @endphp
                <div class="dropdown-title">
                    {{ __('Activo') }}, {{ \Carbon\Carbon::parse($loginTime->login_time)->diffForHumans() }}
                </div>

                {{-- Perfil --}}
                <a href="{{ route('profile.edit') }}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i>&nbsp; {{ __('Perfil') }}
                </a>

                {{-- Actividades --}}
                <a href="{{ route('profile.actividades.index') }}" class="dropdown-item has-icon">
                    <i class="bi bi-lightning"></i>&nbsp;{{ __('Lista Actividades') }}
                </a>

                {{-- Actividades All (Incluye Actividades con description null)--}}
                <a href="{{ route('profile.actividadesAll.index') }}" class="dropdown-item has-icon" title="{{ __('Incluye todas las actividades con description null') }}">
                    <i class="bi bi-lightning"></i>&nbsp;{{ __('Lista Actividades Todas') }}
                </a>

                {{-- Registro de Actividad --}}
                <a href="{{ route('profile.register-activity.view') }}" class="dropdown-item has-icon">
                    <i class="bi bi-pencil-square"></i>&nbsp;{{ __('Registra Actividad') }}
                </a>

                {{-- Configuraciones --}}
                <a href="{{ route('admin.settings.index') }}" class="dropdown-item has-icon">
                    <i class="bi bi-gear"></i>&nbsp;{{ __('Configuraciones') }}
                </a>

                {{-- Version --}}
                <a href="{{ route('profile.admin.info.version') }}" class="dropdown-item has-icon">
                    <i class="bi bi-info-circle"></i>&nbsp;{{ __('Versión') }}
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