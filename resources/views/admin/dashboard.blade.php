@extends('admin.layouts.master')
@section('content')

    <section class="section">

        <div class="section-header">
            <h1>{{ __('Dashboard') }}</h1>
        </div>

        <div class="row">

            <!-- Total Blogs -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fab fa-blogger"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>{{ __('Total de Blogs') }}</h4>
                        </div>
                        <div class="card-body">
                            {{ $totalBlogs }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Skills | Habilidades -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-id-card"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>{{ __('Total de Habilidades') }}</h4>
                        </div>
                        <div class="card-body">
                            {{ $totalSkills }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Porfolio -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-newspaper"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>{{ __('Total de Portafolio') }}</h4>
                        </div>
                        <div class="card-body">
                            {{ $totalPorfolio }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Feedbacks | Comentarios | Testimonios -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>{{ __('Total de Testimonios') }}</h4>
                        </div>
                        <div class="card-body">
                            {{ $totalFeedback }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Activities | Actividades -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-secondary">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>{{ __('Total de Actividades') }}</h4>
                        </div>
                        <div class="card-body">
                            {{ $totalActivities }}
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <hr>
        <br><br>

        <div class="row">

            {{-- Settings --}}
            <div class="col-lg-6">
                <div class="card card-large-icons">
                    <div class="card-icon bg-primary text-white">
                        <a class="icon-link text-white" href="{{ route('admin.settings.index') }}">
                            <i class="fas fa-cog"></i>
                        </a>
                    </div>
                    <div class="card-body">
                        <h4>{{ __('Configurar') }}</h4>
                        <p style="line-height: 1.2;">{{ __('Actualizar configuraciones generales') }}</p>
                        <a href="{{ route('admin.settings.index') }}" class="card-cta">{{ __('Configuraciones') }} <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>

            {{-- SEO Settings --}}
            {{-- <div class="col-lg-6">
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
            </div> --}}

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
                        <p style="line-height: 1.2;">{{ __('Lista de actividades en el sistema') }}</p>
                        <a href="{{ route('profile.actividades.index') }}" class="card-cta">{{ __('Lista de Actividades') }} <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>
            

            {{-- All Activities --}}
            {{-- <div class="col-lg-6">
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
            </div> --}}

        </div>

    </section>

@endsection