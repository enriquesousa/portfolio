@extends('admin.layouts.master')
@section('content')
    <section class="section">

        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('dashboard') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            @php
                $tituloPagina = __('Información de Contacto en pie de pagina');
                $subTituloPagina = __('Información de Contacto en pie de pagina');
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
                                <!-- Botón Vista Modal -->
                                <a href="javascript:void(0)" class="btn btn-warning" data-toggle="modal" data-target="#image-preview-modal" data-bs-title="{{ __('Vista Previa') }}" data-image="ImagePreview-Footer-Contacto-800x289.png" data-bs-width="480" data-bs-height="428" title="Ver donde queda este titulo en la sección">
                                    <i class="fas fa-eye"></i> {{ __('Vista Previa') }}
                                </a>
                            </div>
                        </div>

                        <div class="card-body">

                            <form action="{{ route('admin.footer-contact-info.update', 1) }}" method="POST">
                                @csrf
                                @method('PUT')


                                {{-- Dirección --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Dirección') }}</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="address" class="form-control" value="{{ @$footerContactInfo->address }}">
                                    </div>
                                </div>

                                {{-- Teléfono --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Teléfono') }}</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="phone" class="form-control" value="{{ @$footerContactInfo->phone }}">
                                    </div>
                                </div>

                                {{-- Correo Electrónico --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Correo Electrónico') }}</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="email" name="email" class="form-control" value="{{ @$footerContactInfo->email }}">
                                    </div>
                                </div>
                                
                                {{-- Website --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Sitio Web') }}</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="website" class="form-control" value="{{ @$footerContactInfo->website }}">
                                    </div>
                                </div>
                                

                                {{-- Botón Submit --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary">{{ __('Actualizar') }}</button>
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

<!-- Modal Image Preview -->
@include('admin.vista-previa.image-preview-modal')