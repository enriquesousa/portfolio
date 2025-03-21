<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">

        <div class="sidebar-brand">
            <a href="{{ route('home') }}" target="_blank">TJWeb</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">TW</a>
        </div>

        <ul class="sidebar-menu">

            <li class="menu-header">{{ __('Control') }}</li>

            {{-- Dashboard --}}
            <li class="nav-item active">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="fas fa-fire"></i>
                    <span>{{ __('Dashboard') }}</span>
                </a>
            </li>

            <li class="menu-header">{{ __('Secciones') }}</li>

            {{-- Sección Héroe --}}
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="bi bi-star"></i>
                    <span>{{ __('Héroe') }}</span>
                </a>
                <ul class="dropdown-menu" style="display: none;">

                    <li>
                        <a class="nav-link" href="{{ route('admin.typer-title.index') }}">
                            {{ __('Titulo Maquina') }}
                        </a>
                    </li>

                    <li>
                        <a class="nav-link" href="{{ route('admin.hero.index') }}">
                            {{ __('Sección Héroe') }}
                        </a>
                    </li>

                </ul>
            </li>

            {{-- Sección Servicios --}}
            <li>
                <a class="nav-link" href="{{ route('admin.service.index') }}">
                    <i class="bi bi-boxes"></i>
                    <span>{{ __('Servicios') }}</span>
                </a>
            </li>

            {{-- About Me - Acerca de mi --}}
            <li>
                <a class="nav-link" href="{{ route('admin.about.index') }}">
                    <i class="bi bi-person-badge"></i>
                    <span>{{ __('Acerca de mi') }}</span>
                </a>
            </li>

            {{-- Sección Portafolio --}}
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Portafolio</span></a>
                <ul class="dropdown-menu" style="display: none;">

                    <li>
                        <a class="nav-link" href="{{ route('admin.category.index') }}">
                            Categorías
                        </a>
                    </li>

                    <li>
                        <a class="nav-link" href="{{ route('admin.hero.index') }}">
                            Sección Héroe
                        </a>
                    </li>

                </ul>
            </li>

        </ul>

    </aside>
</div>
