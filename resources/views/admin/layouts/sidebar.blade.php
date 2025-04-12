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

            {{-- Panel Dashboard --}}
            <li class="nav-item {{ setSidebarActive(['dashboard']) }}">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="fas fa-fire"></i>
                    <span>{{ __('Dashboard') }}</span>
                </a>
            </li>

            <li class="menu-header">{{ __('Secciones') }}</li>

            {{-- Sección Héroe --}}
            <li class="nav-item dropdown {{ setSidebarActive(['admin.typer-title.*', 'admin.hero.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="bi bi-star"></i>
                    <span>{{ __('Héroe') }}</span>
                </a>
                <ul class="dropdown-menu" style="display: none;">

                    <li class="{{ setSidebarActive(['admin.typer-title.*']) }}">
                        <a class="nav-link" href="{{ route('admin.typer-title.index') }}">
                            {{ __('Titulo Maquina') }}
                        </a>
                    </li>

                    <li class="{{ setSidebarActive(['admin.hero.*']) }}">
                        <a class="nav-link" href="{{ route('admin.hero.index') }}">
                            {{ __('Configurar Sección') }}
                        </a>
                    </li>

                </ul>
            </li>

            {{-- Sección Servicios --}}
            <li class="nav-item {{ setSidebarActive(['admin.service.*']) }}">
                <a class="nav-link" href="{{ route('admin.service.index') }}">
                    <i class="bi bi-boxes"></i>
                    <span>{{ __('Servicios') }}</span>
                </a>
            </li>

            {{-- About Me - Acerca de mi --}}
            <li class="nav-item {{ setSidebarActive(['admin.about.*']) }}">
                <a class="nav-link" href="{{ route('admin.about.index') }}">
                    <i class="bi bi-person-badge"></i>
                    <span>{{ __('Acerca de mi') }}</span>
                </a>
            </li>

            {{-- Sección Portafolio --}}
            <li class="nav-item dropdown {{ setSidebarActive(['admin.category.*', 'admin.portfolio-item.*', 'admin.portfolio-section-setting.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="bi bi-briefcase"></i>
                    <span>{{ __('Portafolio') }}</span>
                </a>
                <ul class="dropdown-menu" style="display: none;">

                    {{-- Categorías --}}
                    <li class="{{ setSidebarActive(['admin.category.*']) }}">
                        <a class="nav-link" href="{{ route('admin.category.index') }}">
                            {{ __('Categorías') }}
                        </a>
                    </li>

                    {{-- Portafolio Items --}}
                    <li class="{{ setSidebarActive(['admin.portfolio-item.*']) }}">
                        <a class="nav-link" href="{{ route('admin.portfolio-item.index') }}">
                            {{ __('Portafolio') }}
                        </a>
                    </li>

                    {{-- Configuración Sección --}}
                    <li class="{{ setSidebarActive(['admin.portfolio-section-setting.*']) }}">
                        <a class="nav-link" href="{{ route('admin.portfolio-section-setting.index') }}" title="{{ __('Configurar Sección titulo, sub-titulo') }}">
                            {{ __('Configurar Sección') }}
                        </a>
                    </li>

                </ul>
            </li>

            {{-- Sección Habilidades --}}
            <li class="nav-item dropdown {{ setSidebarActive(['admin.skill-item.*', 'admin.skill-section-setting.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="bi bi-person-lines-fill"></i>
                    <span>{{ __('Habilidades') }}</span>
                </a>
                <ul class="dropdown-menu" style="display: none;">

                    {{-- Lista habilidades, skill items --}}
                    <li class="{{ setSidebarActive(['admin.skill-item.*']) }}">
                        <a class="nav-link" href="{{ route('admin.skill-item.index') }}">
                            {{ __('Lista Habilidades') }}
                        </a>
                    </li>

                    {{-- Configurar Sección: titulo, sub-titulo y foto --}}
                    <li class="{{ setSidebarActive(['admin.skill-section-setting.*']) }}">
                        <a class="nav-link" href="{{ route('admin.skill-section-setting.index') }}" title="{{ __('Configurar Sección titulo, sub-titulo y foto') }}">
                            {{ __('Configurar Sección') }}
                        </a>
                    </li>

                </ul>
            </li>

            {{-- Sección - Experiencia --}}
            <li class="nav-item {{ setSidebarActive(['admin.experience.*']) }}">
                <a class="nav-link" href="{{ route('admin.experience.index') }}">
                    <i class="bi bi-braces"></i>
                    <span>{{ __('Experiencia') }}</span>
                </a>
            </li>

            {{-- Sección Comentarios de nuestros clientes - Comentarios Feedback --}}
            <li class="nav-item dropdown {{ setSidebarActive(['admin.feedback.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="bi bi-people-fill"></i>
                    <span>{{ __('Comentarios') }}</span>
                </a>
                <ul class="dropdown-menu" style="display: none;">

                    {{-- Lista comentarios --}}
                    <li class="{{ setSidebarActive(['admin.feedback.*']) }}">
                        <a class="nav-link" href="{{ route('admin.feedback.index') }}">
                            {{ __('Lista Comentarios') }}
                        </a>
                    </li>

                    {{-- Configurar Sección: Comentarios titulo, sub-titulo --}}
                    <li class="{{ setSidebarActive(['admin.feedback-section-setting.*']) }}">
                        <a class="nav-link" href="{{ route('admin.feedback-section-setting.index') }}" title="{{ __('Configurar Sección titulo, sub-titulo') }}">
                            {{ __('Configurar Sección') }}
                        </a>
                    </li>

                </ul>
            </li>

            {{-- Sección - Blog --}}
            <li class="nav-item dropdown {{ setSidebarActive(['admin.blog.*','admin.blog-category.*', 'admin.blog-section-setting.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="bi bi-newspaper"></i>
                    <span>{{ __('Blog') }}</span>
                </a>
                <ul class="dropdown-menu" style="display: none;">

                    <!-- Lista comentarios -->
                    <li class="{{ setSidebarActive(['admin.blog-category.*']) }}">
                        <a class="nav-link" href="{{ route('admin.blog-category.index') }}">
                            {{ __('Categorías') }}
                        </a>
                    </li>

                    <!-- Lista de Blogs -->
                    <li class="{{ setSidebarActive(['admin.blog.*']) }}">
                        <a class="nav-link" href="{{ route('admin.blog.index') }}">
                            {{ __('Lista de Blogs') }}
                        </a>
                    </li>

                    <!-- Configurar Sección -->
                    <li class="{{ setSidebarActive(['admin.blog-section-setting.*']) }}">
                        <a class="nav-link" href="{{ route('admin.blog-section-setting.index') }}">
                            {{ __('Configurar Sección') }}
                        </a>
                    </li>

                </ul>
            </li>

            {{-- Sección - Contacto --}}
            <li class="nav-item dropdown {{ setSidebarActive(['admin.contact-section-setting.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="bi bi-envelope"></i>
                    <span>{{ __('Contacto') }}</span>
                </a>
                <ul class="dropdown-menu" style="display: none;">

                    <!-- Configurar Sección -->
                    <li class="{{ setSidebarActive(['admin.contact-section-setting.*']) }}">
                        <a class="nav-link" href="{{ route('admin.contact-section-setting.index') }}">
                            {{ __('Configurar Sección') }}
                        </a>
                    </li>

                </ul>
            </li>

        </ul>

    </aside>
</div>
