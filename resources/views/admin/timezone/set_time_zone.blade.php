@extends('admin.layouts.master')
@section('content')
    <section class="section">

        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ redirect()->back()->getTargetUrl() }}" title="{{ __('Página Anterior') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>{{ __('Zona Horaria') }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">{{ __('Panel') }}</a></div>
                <div class="breadcrumb-item">{{ __('Configuraciones') }}</div>
                <div class="breadcrumb-item">{{ __('Zona Horaria') }}</div>
            </div>
        </div>

        <div class="section-body">

            <h2 class="section-title">{{ __('Actualizar Zona Horaria') }}</h2>
            <p class="section-lead">
                {{ __('Cambiar zona horaria del sitio.') }}
            </p>

            <div class="row mt-sm-4">

                {{-- Columna --}}
                <div class="col-12 col-md-12 col-lg-12">

                    {{-- Seleccionar Idioma --}}
                    <div class="card">

                        <div class="card-header">
                            <h4>{{ __('Seleccionar Zona Horaria') }}</h4>
                        </div>

                        <div class="card-body">

                            @php
                                $generalSetting = \App\Models\GeneralSetting::first();
                                $zonaHoraria = $generalSetting->time_zone;
                            @endphp
                            <p class="card-subtitle">{{ __('Cambiar zona horaria del sitio.') }}  {{ __('Actualmente la zona horaria es: ') }} <span class="fw-bold text-warning">{{ $zonaHoraria }}</span></p>

                            <form action="{{ route('profile.timezone.update') }}" method="POST">
                                @csrf
                                @method('patch')

                                <div class="row mt-3">

                                    {{-- Select Timezone --}}
                                    <div class="form-group col-md-6 col-12">
                                        <label>{{ __('Seleccionar Zona Horaria') }}</label>
                                        <select class="form-control selectric" name="time_zone">
                                            @foreach ($timezones as $timezone)
                                            <option @selected($generalSetting->time_zone === $timezone->name) value="{{ $timezone->name }}">{{ $timezone->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>

                                {{-- Botón Actualizar Zona Horaria --}}
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary">{{ __('Actualizar') }}</button>
                                </div>

                            </form>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>
@endsection
