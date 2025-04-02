@extends('admin.layouts.master')
@section('content')
    <section class="section">

        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('dashboard') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            @php
                $tituloPagina = __('Agregar Comentario');
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

                                <!-- Button trigger modal -->
                                <a href="{{ route('admin.vista-previa.index',['Sección - '.$tituloPagina, 'portafolio-settings-preview.png', 'admin.portfolio-section-setting.index']) }}" class="btn btn-warning" title="{{  __('Ver donde quedan estos elementos en la sección') }}">
                                    <i class="fas fa-eye"></i> {{ __('Vista Previa') }}
                                </a>

                            </div>

                        </div>

                        <div class="card-body">

                            <form action="{{ route('admin.feedback.store') }}" method="POST">
                                @csrf

                                {{-- Nombre del Cliente --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Titulo') }}</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="name" class="form-control" value="">
                                    </div>
                                </div>

                                {{-- Posición --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Posición') }}</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="position" class="form-control" value="">
                                    </div>
                                </div>

                                {{-- Descripción --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Descripción') }}</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea name="description" class="summernote" style="height: 100px; width: 100%"></textarea>
                                    </div>
                                </div>
                                

                                {{-- Botón Submit --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary">{{ __('Agregar') }}</button>
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

