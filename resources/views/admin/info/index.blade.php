@extends('admin.layouts.master')

@section('content')
    <section class="section">

        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ redirect()->back()->getTargetUrl() }}" title="{{ __('Página Anterior') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            @php
                $tituloPagina = __('Información');
                $subTituloPagina = __('Información del sistema (Versión, Dependencias, etc.)');
            @endphp
            <h1>{{ $tituloPagina }}</h1>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header">
                            <h4>{{ $subTituloPagina }}</h4>
                            <div class="card-header-action">

                            </div>
                        </div>

                        <div class="card-body">

                            <!-- Version -->
                            <h2 class="section-title">{{ __('Nombre de la Aplicación') }}: {{ config('app.name') }}</h2>
                            <p class="section-lead">
                                <i class="fas fa-check-circle"></i> Versión:  v{{ config('app.version') }} <br>
                                <i class="fas fa-check-circle"></i> {{ __('Ultimas Actualizaciones') }}:  <br>

                                <strong>(v1.2.0)</strong><br>
                                &nbsp;&nbsp;&nbsp;&nbsp; 
                                    <code><small>27.05.25</small></code> {{ __('Agregar Información de la Aplicación') }} <br>
                            </p>
                            
                            <!-- Backend -->
                            <h2 class="section-title">{{ __('Backend') }}</h2>
                            <p class="section-lead">
                                <i class="fas fa-check-circle"></i> Laravel v{{ Illuminate\Foundation\Application::VERSION }} <br>
                                <i class="fas fa-check-circle"></i> PHP v{{ PHP_VERSION }} <br>
                                <i class="fas fa-check-circle"></i> Laravel Breeze v2.3 <br>
                                <i class="fas fa-check-circle"></i> Bootstrap v4.3.1 <br>
                                <i class="fas fa-check-circle"></i> CDN CLODUFLARE JQuery v3.6.0 <br>
                            </p>

                            <h2 class="section-title">{{ __('Frontend') }}</h2>
                            <p class="section-lead">
                                <i class="fas fa-check-circle"></i> Bootstrap  v5.2.0 <br>
                                <i class="fas fa-check-circle"></i> Font Awesome v5.15.4 <br>
                                <i class="fas fa-check-circle"></i> JQuery v1.12.4 <br>
                            </p>

                            <h2 class="section-title">{{ __('Package Managers') }}</h2>
                            <p class="section-lead">
                                <i class="fas fa-check-circle"></i> Composer v2.5.5 <br>
                                <i class="fas fa-check-circle"></i> Node v18.19.0 <br>
                                <i class="fas fa-check-circle"></i> Npm v9.2.0 <br>
                            </p>

                            <h2 class="section-title">{{ __('Packages') }}</h2>
                            <p class="section-lead">
                                <i class="fas fa-check-circle"></i> yajra datatables v11.0 <br>
                            </p>


                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

