@extends('admin.layouts.master')
@section('content')

    <section class="section">

        <div class="section-header">

            <div class="section-header-back">
                <a href="{{ redirect()->back()->getTargetUrl() }}" title="{{ __('Página Anterior') }}" class="btn btn-icon">
                    <i class="fas fa-arrow-left"></i>
                </a>
            </div>
            
            @php
                $tituloPagina = __('Zonas Horarias');
                $subTituloPagina = __('Todas las Zonas Horarias');
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
                                <!-- Botón Asignar Zona Horaria -->
                                <a href="{{ route('profile.timezone.select') }}" class="btn btn-success">
                                    <i class="fas fa-globe"></i> {{ __('Asignar Zona Horaria') }}
                                </a>
                                <!-- Botón Agregar -->
                                <a href="{{ route('admin.time-zone.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> {{ __('Agregar') }}
                                </a>
                            </div>
                        </div>
                        <div class="card-subheader">
                            <p>{{ __('Aquí puedes ver todas las zonas horarias disponibles. Para agregar una nueva zona horaria, haz clic en el botón Agregar. Para asignar una zona horaria al sitio, haz clic en el botón Asignar Zona Horaria.') }}</p>
                        </div>

                        <div class="card-body">
                            {{ $dataTable->table() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

@push('child-scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush

