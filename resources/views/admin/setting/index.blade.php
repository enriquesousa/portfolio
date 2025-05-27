@extends('admin.layouts.master')
@section('content')
 
    <section class="section">

        <div class="section-header">
            <h1>{{ __('Configuraciones') }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">{{ __('Panel') }}</a></div>
                <div class="breadcrumb-item">{{ __('Configuraciones') }}</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">{{ __('Configuraciones') }}</h2>
            <p class="section-lead">
                {{ __('Organizar y ajustar todas las configuraciones de este sitio.') }}
            </p>

            <div class="row">

                {{-- Settings Logos --}}
                <div class="col-lg-6">
                    <div class="card card-large-icons">
                        <div class="card-icon bg-primary text-white">
                            <a class="icon-link text-white" href="{{ route('admin.general-setting.index') }}">
                                {{-- <i class="fas fa-cog"></i> --}}
                                <i class="far fa-images"></i>
                            </a>
                        </div>
                        <div class="card-body">
                            <h4>{{ __('Config. Logos') }}</h4>
                            <p style="line-height: 1.2;">{{ __('Configurar logo, logo footer y favicon') }}</p>
                            <a href="{{ route('admin.general-setting.index') }}" class="card-cta">{{ __('Configurar') }} <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>

                {{-- SEO Settings --}}
                <div class="col-lg-6">
                    <div class="card card-large-icons">
                        <div class="card-icon bg-primary text-white">
                            <a class="icon-link text-white" href="{{ route('admin.seo-setting.index') }}">
                                <i class="fas fa-search"></i>
                            </a>
                        </div>
                        <div class="card-body">
                            <h4>SEO</h4>
                            <p style="line-height: 1.2;">{{ __('Configuraciones de optimización de motores de búsqueda, como meta-etiquetas etc.') }}</p>
                            <a href="{{ route('admin.seo-setting.index') }}" class="card-cta">{{ __('Cambiar Configuración') }} <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>

                {{-- Settings Contacto Footer Contact - Dirección, Teléfono, Correo, Sitio Web--}}
                <div class="col-lg-6">
                    <div class="card card-large-icons">
                        <div class="card-icon bg-primary text-white">
                            <a class="icon-link text-white" href="{{ route('admin.footer-contact-info.index') }}">
                                <i class="far fa-address-card"></i>
                            </a>
                        </div>
                        <div class="card-body">
                            <h4>{{ __('Información de Contacto') }}</h4>
                            <p style="line-height: 1.2;">{{ __('Configurar Dirección, Teléfono, Correo, y Website') }}</p>
                            <a href="{{ route('admin.footer-contact-info.index') }}" class="card-cta">{{ __('Configurar') }} <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>

                {{-- Settings Profile Language Edit - Cambiar el Lenguaje de tu Perfil--}}
                <div class="col-lg-6">
                    <div class="card card-large-icons">
                        <div class="card-icon bg-primary text-white">
                            <a class="icon-link text-white" href="{{ route('profile.language.edit') }}">
                                <i class="fas fa-language"></i>
                            </a>
                        </div>
                        <div class="card-body">
                            <h4>{{ __('Lenguaje de Perfil') }}</h4>
                            <p style="line-height: 1.2;">{{ __('Cambiar el idioma de tu perfil.') }}</p>
                            <a href="{{ route('profile.language.edit') }}" class="card-cta">{{ __('Configurar') }} <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>

                {{-- Cambiar Zona Horaria--}}
                <div class="col-lg-6">
                    <div class="card card-large-icons">
                        <div class="card-icon bg-primary text-white">
                            <a class="icon-link text-white" href="{{ route('profile.timezone.select') }}">
                                <i class="fas fa-clock"></i>
                            </a>
                        </div>
                        <div class="card-body">
                            <h4>{{ __('Zona Horaria') }}</h4>
                            <p style="line-height: 1.2;">{{ __('Cambiar zona horaria del sitio.') }}</p>
                            <a href="{{ route('profile.timezone.select') }}" class="card-cta">{{ __('Configurar') }} <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>

                {{-- Activities --}}
                <div class="col-lg-6">
                    <div class="card card-large-icons">
                        <div class="card-icon bg-primary text-white">
                            <a class="icon-link text-white" href="{{ route('profile.actividades.index') }}">
                                <i class="fas fa-filter"></i>
                            </a>
                        </div>
                        <div class="card-body">
                            <h4>{{ __('Actividades') }}</h4>
                            <p style="line-height: 1.2;">{{ __('Lista de actividades en el sistema, solo con contenido.') }}</p>
                            <a href="{{ route('profile.actividades.index') }}" class="card-cta">{{ __('Lista de Actividades') }} <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                
                {{-- All Activities --}}
                <div class="col-lg-6">
                    <div class="card card-large-icons">
                        <div class="card-icon bg-primary text-white">
                            <a class="icon-link text-white" href="{{ route('profile.actividadesAll.index') }}">
                                <i class="fas fa-bolt"></i>
                            </a>
                        </div>
                        <div class="card-body">
                            <h4>{{ __('Todas las Actividades') }}</h4>
                            <p style="line-height: 1.2;">{{ __('Lista de actividades en el sistema, lista todas las actividades.') }}</p>
                            <a href="{{ route('profile.actividadesAll.index') }}" class="card-cta" title="{{ __('Incluye todas las actividades con description null') }}">{{ __('Lista todas las Actividades') }} <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>

                {{-- Information - PHP Version --}}
                <div class="col-lg-6">
                    <div class="card card-large-icons">
                        <div class="card-icon bg-primary text-white">
                            <a class="icon-link text-white" href="{{ route('profile.admin.info.version') }}">
                                <i class="fas fa-info-circle"></i>
                            </a>
                        </div>
                        <div class="card-body">
                            <h4>{{ __('Información') }}</h4>
                            <p style="line-height: 1.2;">{{ __('Version de PHP, Versión de MySQL y Versión de Laravel etc...') }}</p>
                            <a href="{{ route('profile.admin.info.version') }}" class="card-cta">{{ __('Información') }} <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>




                {{-- Email Settings --}}
                {{-- <div class="col-lg-6">
                    <div class="card card-large-icons">
                        <div class="card-icon bg-primary text-white">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="card-body">
                            <h4>Email</h4>
                            <p>Email SMTP settings, notifications and others related to email.</p>
                            <a href="features-setting-detail.html" class="card-cta">Change Setting <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div> --}}

                {{-- Security Settings --}}
                {{-- <div class="col-lg-6">
                    <div class="card card-large-icons">
                        <div class="card-icon bg-primary text-white">
                            <i class="fas fa-lock"></i>
                        </div>
                        <div class="card-body">
                            <h4>Security</h4>
                            <p>Security settings such as firewalls, server accounts and others.</p>
                            <a href="features-setting-detail.html" class="card-cta">Change Setting <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div> --}}

                {{-- Automation Settings --}}
                {{-- <div class="col-lg-6">
                    <div class="card card-large-icons">
                        <div class="card-icon bg-primary text-white">
                            <i class="fas fa-stopwatch"></i>
                        </div>
                        <div class="card-body">
                            <h4>Automation</h4>
                            <p>Settings about automation such as cron job, backup automation and so on.</p>
                            <a href="features-setting-detail.html" class="card-cta text-primary">Change Setting <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div> --}}

            </div>
        </div>

    </section>

@endsection
