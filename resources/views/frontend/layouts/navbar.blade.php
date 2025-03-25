<nav class="navbar navbar-expand-lg main_menu" id="main_menu_area">
    <div class="container">

        <a class="navbar-brand" href="{{ url('/'.getSessionLocale()) }}">
            <img src="{{ asset('images/logo-h.png') }}" alt="TJWeb">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="far fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">

                {{-- Inicio --}}
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}" title="{{ __('Home') }}" style="font-size: 25px;"><iconify-icon icon="fluent-color:home-16"></iconify-icon></a>
                </li>

                {{-- Sobre --}}
                <li class="nav-item">
                    <a class="nav-link" href="#about-page" title="{{ __('About') }}" style="font-size: 25px;"><iconify-icon icon="mdi:about-variant"></iconify-icon></a>
                </li>

                {{-- Idioma --}}
                <li class="nav-item">

                    {{-- <a class="nav-link" href="#" style="font-size: 25px;" title="{{ __('Language') }}"><iconify-icon icon="clarity:language-line"></iconify-icon>&nbsp;&nbsp;{{ app()->getLocale() == 'en' ? 'English' : 'Español' }} &nbsp;&nbsp;<i class="fas fa-angle-down"></i></a> --}}

                    <a class="nav-link" href="#" style="font-size: 15px; font-weight: 300;" title="{{ __('Language') }}"><iconify-icon icon="clarity:language-line"></iconify-icon>&nbsp;&nbsp;{{ app()->getLocale() == 'en' ? 'English' : 'Español' }} &nbsp;&nbsp;<i class="fas fa-angle-down"></i></a>

                    <ul class="sub_menu">
                        <li><a href="{{ url('locale/en') }}"><iconify-icon icon="twemoji:flag-us-outlying-islands"></iconify-icon>&nbsp;&nbsp;{{ __('Translate to English') }}</a></li>
                        <li><a href="{{ url('locale/es') }}"><iconify-icon icon="flag:mx-1x1"></iconify-icon>&nbsp;&nbsp;{{ __('Translate to Spanish') }}</a></li>
                        
                    </ul>
                </li>

                {{-- Portfolio --}}
                <li class="nav-item">
                    <a class="nav-link" href="#portfolio-page">{{ __('Portfolio') }} <i class="fas fa-angle-down"></i></a>
                    <ul class="sub_menu">
                        <li><a href="portfolio.html">{{ __('Portfolio Grid') }}</a></li>
                        <li><a href="{{ route('login') }}"><i class="bi bi-person-gear"></i>&nbsp;&nbsp;{{ __('Admin Login') }}</a></li>
                    </ul>
                </li>

                {{-- Habilidades --}}
                <li class="nav-item">
                    <a class="nav-link" href="#skills-page">{{ __('Skills') }}</a>
                </li>

                {{-- Blog --}}
                <li class="nav-item">
                    <a class="nav-link" href="#blog-page">{{ __('Blog') }} <i class="fas fa-angle-down"></i></a>
                    <ul class="sub_menu">
                        <li><a href="blog.html">{{ __('Blog Grid') }}</a></li>
                    </ul>
                </li>

                {{-- Contacto --}}
                <li class="nav-item">
                    <a class="nav-link" href="#contact-page">{{ __('Contact') }}</a>
                </li>

            </ul>
        </div>

    </div>
</nav>