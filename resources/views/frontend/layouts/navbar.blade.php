@php
    $generalSetting = \App\Models\GeneralSetting::first();
@endphp
<nav class="navbar navbar-expand-lg main_menu" id="main_menu_area">
    <div class="container">

        <a class="navbar-brand" href="{{ url('/') }}">
            {{-- <img src="{{ asset('images/logo-h.png') }}" alt="TJWeb"> --}}
            <img src="{{ asset($generalSetting->logo) }}" alt="TJWeb">
            {{-- <p>{{ Route::currentRouteName() }}</p> --}}
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="far fa-bars"></i>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">

                {{-- Inicio --}}
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ Route::currentRouteName() == 'home' ? '#home-page' : url('/') }}" title="{{ __('Home') }}" style="font-size: 25px;"><iconify-icon icon="fluent-color:home-16"></iconify-icon></a>
                </li>

                {{-- if user is login display dashboard link--}}
                @auth
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('dashboard') }}" title="{{ __('Panel') }}" style="font-size: 22px; color: #e4805c;"><iconify-icon icon="fa-solid:user-cog"></iconify-icon></a>
                    </li>
                @endauth

                @if(Route::currentRouteName() == 'home')

                    {{-- Idioma --}}
                    <li class="nav-item">

                        {{-- <a class="nav-link" href="#" style="font-size: 25px;" title="{{ __('Language') }}"><iconify-icon icon="clarity:language-line"></iconify-icon>&nbsp;&nbsp;{{ app()->getLocale() == 'en' ? 'English' : 'Español' }} &nbsp;&nbsp;<i class="fas fa-angle-down"></i></a> --}}

                        {{-- if user is login --}}
                        @auth
                            {{-- <ul class="sub_menu">
                                <li title="{{ __('Para cambiar el idioma, vaya a Panel de Control') }}"><a href="{{ route('profile.edit') }}">{{ __('Ir a Panel de Control') }}</a></li>
                            </ul> --}}
                        @else
                            <a class="nav-link" href="#" style="font-size: 15px; font-weight: 300;" title="{{ __('Language') }}"><iconify-icon icon="clarity:language-line"></iconify-icon>&nbsp;{{ app()->getLocale() == 'en' ? 'English' : 'Español' }} &nbsp;&nbsp;<i class="fas fa-angle-down"></i></a>

                            <ul class="sub_menu">
                                <li><a href="{{ url('locale/en') }}"><iconify-icon icon="twemoji:flag-us-outlying-islands"></iconify-icon>&nbsp;&nbsp;{{ __('Translate to English') }}</a></li>
                                <li><a href="{{ url('locale/es') }}"><iconify-icon icon="flag:mx-1x1"></iconify-icon>&nbsp;&nbsp;{{ __('Translate to Spanish') }}</a></li>
                            </ul>
                        @endauth

                    </li>

                    {{-- Portfolio --}}
                    <li class="nav-item">
                        <a class="nav-link" href="#portfolio-page">{{ __('Portfolio') }}&nbsp; <i class="fas fa-angle-down"></i></a>
                        <ul class="sub_menu">

                            <li><a href="#home-page">{{ __('Sección Inicio') }}</a></li><br>

                            <li><a href="#services-page">{{ __('Servicios') }}</a></li><br>

                            <li><a href="#about-page">{{ __('Acerca de mi') }}</a></li><br>

                            <li><a href="#portfolio-page">{{ __('Portafolio') }}</a></li><br>

                            <li><a href="#skills-page">{{ __('Skills') }}</a></li><br>

                            <li><a href="#experience-page">{{ __('Experiencia') }}</a></li><br>

                            <li><a href="#testimonials-page">{{ __('Testimonios') }}</a></li><br>

                            <li><a href="#blog-page">{{ __('Blog') }}</a></li><br>

                            <li><a href="#contact-page">{{ __('Contacto') }}</a></li><br>

                            <li><a href="#footer-area">{{ __('Pie de pagina') }}</a></li><br>

                            {{-- @if(!Auth::check())
                                <li>
                                    <a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i>&nbsp;{{ __('Admin') }}</a>
                                </li>
                            @else
                                <li>
                                    <a href="{{ route('dashboard') }}"><i class="fas fa-tachometer-alt"></i>&nbsp;{{ __('Dashboard') }}</a>
                                </li>
                            @endif --}}

                        </ul>
                    </li>

                    {{-- Contacto --}}
                    <li class="nav-item">
                        <a class="nav-link" href="#contact-page">{{ __('Contact') }}</a>
                    </li>

                    {{-- Admin Login --}}
                    {{-- @if(!Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i>&nbsp;{{ __('Admin') }}</a>
                    </li>
                    @endif --}}

                @endif

                {{-- Blogs --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('show.blogs') }}">{{ __('Blog') }}</a>
                </li>

            </ul>
        </div>

    </div>
</nav>