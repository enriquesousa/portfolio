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

                {{-- General Settings --}}
                <div class="col-lg-6">
                    <div class="card card-large-icons">
                        <div class="card-icon bg-primary text-white">
                            <i class="fas fa-cog"></i>
                        </div>
                        <div class="card-body">
                            <h4>{{ __('General') }}</h4>
                            <p>{{ __('Configuraciones generales como, logo, favicon, titulo del sitio, Descripción, etc...') }}</p>
                            <a href="{{ route('admin.general-setting.index') }}" class="card-cta">{{ __('Cambiar Configuración') }} <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>

                {{-- SEO Settings --}}
                <div class="col-lg-6">
                    <div class="card card-large-icons">
                        <div class="card-icon bg-primary text-white">
                            <i class="fas fa-search"></i>
                        </div>
                        <div class="card-body">
                            <h4>SEO</h4>
                            <p>{{ __('Configuraciones de optimización de motores de búsqueda, como meta-etiquetas y redes sociales.') }}</p>
                            <a href="{{ route('admin.seo-setting.index') }}" class="card-cta">{{ __('Cambiar Configuración') }} <i class="fas fa-chevron-right"></i></a>
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

                {{-- PHP Version and timezone --}}
                {{-- <div class="col-lg-6">
                    <div class="card card-large-icons">
                        <div class="card-icon bg-primary text-white">
                            <i class="fas fa-power-off"></i>
                        </div>
                        <div class="card-body">
                            <h4>System</h4>
                            <p>PHP version settings, time zones and other environments.</p>
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
