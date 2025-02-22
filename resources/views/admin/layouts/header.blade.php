<div class="navbar-bg"></div>

<nav class="navbar navbar-expand-lg main-navbar">
    <div class="form-inline mr-auto"></div>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">Hi, Ujang Maman</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">Logged in 5 min ago</div>

                {{-- Perfil --}}
                <a href="features-profile.html" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Perfil
                </a>

                {{-- Configuraciones --}}
                <a href="features-settings.html" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i> Configuraciones
                </a>

                {{-- Linea divisoria --}}
                <div class="dropdown-divider"></div>

                {{-- Logout --}}
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="#" class="dropdown-item has-icon text-danger" onclick="event.preventDefault(); this.closest('form').submit();">
                        <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
                    </a>
                </form>


            </div>
        </li>
    </ul>
</nav>