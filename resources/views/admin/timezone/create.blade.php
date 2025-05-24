@extends('admin.layouts.master')

@section('content')
    <section class="section">

        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.time-zone.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            @php
                $tituloPagina = __('Agregar Zona Horaria');
            @endphp
            <h1>{{ $tituloPagina }}</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header">
                            <h4>{{ $tituloPagina }}</h4>
                            <div class="card-header-action">
                            </div>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.time-zone.store') }}" method="POST">
                                @csrf

                                
                                {{-- Nombre Zona Horaria --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Nombre Zona Horaria') }}</label>
                                    <div class="col-sm-12 col-md-7">
                                        <p class="text-muted" style="font-size: 12px;">
                                            {{ __('Puede encontrar la zona horaria en el siguiente enlace: ') }}<a href="https://www.php.net/manual/en/timezones.america.php" target="_blank">{{ __('Zonas Horarias') }}</a><br>
                                            {{ __('Ejemplo: America/Argentina/Buenos_Aires') }}<br>
                                            {{ __('Ejemplo: America/Los_Angeles') }}<br>
                                            {{ __('Ejemplo: America/New_York') }}<br>
                                            {{ __('Ejemplo: America/Mexico_City') }}<br>
                                            {{ __('Ejemplo: America/Bogota') }}
                                        </p>
                                        <input type="text" name="name" class="form-control" autofocus>
                                    </div>
                                </div>

                                {{-- Botón Submit --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary">{{ __('Crear') }}</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

