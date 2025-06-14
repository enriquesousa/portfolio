@extends('admin.layouts.master')
@section('content')
    <section class="section">

        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.footer-social.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            @php
                $tituloPagina = __('Editar Red Social');
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
                                <!-- Botón Vista Modal -->
                                <a href="javascript:void(0)" class="btn btn-warning" data-toggle="modal" data-target="#image-preview-modal" data-bs-title="{{ __('Vista Previa') }}" data-image="ImagePreview-Footer-RedesSociales-800x289.png" data-bs-width="480" data-bs-height="428" title="Ver donde queda este titulo en la sección">
                                    <i class="fas fa-eye"></i> {{ __('Vista Previa') }}
                                </a>
                            </div>
                        </div>

                        <div class="card-body">

                            <form action="{{ route('admin.footer-social.update', $social->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                {{-- Bootstrap ICON Picker --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Icono') }}</label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-warning" name="icon" role="iconpicker" data-iconset="fontawesome5" data-icon="{{ $social->icon }}"></button>
                                    </div>
                                </div>

                                {{-- Nombre --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Nombre') }}</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="name" class="form-control" value="{{ $social->name }}">
                                    </div>
                                </div>

                                {{-- URL --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('URL') }}</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="url" class="form-control" value="{{ $social->url }}">
                                    </div>
                                </div>

                                {{-- Tooltip --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Tooltip') }}</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="tooltip" class="form-control" value="{{ $social->tooltip }}">
                                    </div>
                                </div>

                                {{-- Status --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Estado') }}</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select name="status" class="form-control selectric">
                                            <option @selected($social->status == 1) value="1">{{ __('Activo') }}</option>
                                            <option @selected($social->status == 0) value="0">{{ __('Inactivo') }}</option>
                                        </select>
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
