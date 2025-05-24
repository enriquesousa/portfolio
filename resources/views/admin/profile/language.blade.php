@extends('admin.layouts.master')
@section('content')
    <section class="section">

        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ redirect()->back()->getTargetUrl() }}" title="{{ __('Página Anterior') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>{{ __('Perfil') }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">{{ __('Panel') }}</a></div>
                <div class="breadcrumb-item">{{ __('Perfil') }}</div>
                <div class="breadcrumb-item">{{ __('Idioma') }}</div>
            </div>
        </div>

        <div class="section-body">

            <h2 class="section-title">{{ __('Hola') }}, {{ old('name', $user->name) }}</h2>
            <p class="section-lead">
                {{ __('Cambia el lenguaje de tu perfil.') }}
            </p>

            <div class="row mt-sm-4">

                {{-- Columna --}}
                <div class="col-12 col-md-12 col-lg-12">

                    {{-- Seleccionar Idioma --}}
                    <div class="card">

                        <div class="card-header">
                            <h4>{{ __('Seleccionar Idioma') }}</h4>
                        </div>

                        <div class="card-body">

                            <p class="card-subtitle">{{ __('Here you can change the language in which the application will be displayed.') }}  {{ __('Currently your language is: ') }} <span class="fw-bold text-warning">{{ App::getLocale()== 'en' ? __('English') : __('Spanish')}}</span></p>

                            <form action="{{ route('profile.language.update') }}" method="POST">
                                @csrf
                                @method('patch')

                                <div class="row mt-3">

                                    {{-- Radio Button, Select Language --}}
                                    <div class="form-group col-md-6 col-12">

                                        @php
                                            $locale = App::getLocale();
                                            if($locale == 'en'){
                                                $status_ingles = 'checked';
                                                $status_español = '';
                                            }elseif ($locale == 'es') {
                                                $status_ingles = '';
                                                $status_español = 'checked';
                                            }
                                            else{
                                                $status_ingles = '';
                                                $status_español = '';
                                            }
                                        @endphp
                                        {{-- Ingles --}}
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="language"
                                                id="flexRadioDefault1" value="en" {{ $status_ingles }}>
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                {{ __('English') }}
                                            </label>
                                        </div>
                                        <br>
                                        {{-- Español --}}
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="language"
                                                id="flexRadioDefault2" value="es" {{ $status_español }}>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                {{ __('Spanish') }}
                                            </label>
                                        </div>

                                    </div>

                                </div>

                                {{-- Botón Update Language --}}
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary">{{ __('Actualizar Idioma') }}</button>
                                </div>

                            </form>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>
@endsection
