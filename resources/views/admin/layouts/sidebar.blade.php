<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">

        <div class="sidebar-brand">
            <a href="{{ route('home') }}" target="_blank">TJWeb</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">TW</a>
        </div>

        <ul class="sidebar-menu">

            <li class="menu-header">Control</li>
            <li class="nav-item active">
                <a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Panel</span></a>
            </li>

            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Dropdown</span></a>
                <ul class="dropdown-menu" style="display: none;">
                    <li><a class="nav-link" href="">test</a></li>

                </ul>
            </li>

            <li class="menu-header">Secciones</li>

            {{-- <li><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank Page</span></a></li> --}}

            {{-- Sección Héroe --}}
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Héroe</span></a>
                <ul class="dropdown-menu" style="display: none;">

                    <li>
                        <a class="nav-link" href="{{ route('admin.typer-title.index') }}">
                            Titulo Maquina
                        </a>
                    </li>

                    <li>
                        <a class="nav-link" href="{{ route('admin.hero.index') }}">
                            Sección Héroe
                        </a>
                    </li>

                </ul>
            </li>

            {{-- Sección Servicios --}}
            <li>
                <a class="nav-link" href="{{ route('admin.service.index') }}">
                    <i class="far fa-square"></i> <span>Servicios</span>
                </a>
            </li>

            {{-- About Me - Acerca de mi --}}
            <li>
                <a class="nav-link" href="{{ route('admin.about.index') }}">
                    <i class="far fa-square"></i> <span>Acerca de mi</span>
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
