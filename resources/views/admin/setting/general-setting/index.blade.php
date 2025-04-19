@extends('admin.layouts.master')
@section('content')
    <section class="section">

        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.settings.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            @php
                $tituloPagina = __('Configuración General');
                $subtituloPagina = __('Actualizar Configuración General');
            @endphp
            <h1>{{ $tituloPagina }}</h1>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header">
                            <h4>{{ $subtituloPagina }}</h4>
                            <div class="card-header-action">
                                <!-- Botón Vista Modal -->
                                <a href="javascript:void(0)" class="btn btn-warning" data-toggle="modal" data-target="#image-preview-modal" data-bs-title="{{ __('Vista Previa') }}" data-image="ImagePreview-Settings-Logo-PiedePag-800x634.png" data-bs-width="480" data-bs-height="428" title="Ver donde queda este titulo en la sección">
                                    <i class="fas fa-eye"></i> {{ __('Vista Previa') }}
                                </a>
                            </div>
                        </div>

                        <div class="card-body">

                            <form action="{{ route('admin.general-setting.update', 1) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                {{-- Logo --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"
                                        title="{{ __('Logo 277x68px, el peso no debe superar 300KB') }}">
                                        {{ __('Logo') }}
                                    </label>
                                    <div class="col-sm-12 col-md-5">
                                        <div class="custom-file">
                                            <input name="logo" type="file" class="custom-file-input image-upload"
                                                id="customFile">
                                            <label class="custom-file-label" for="customFile">{{ __('Logo') }}</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <x-logo-preview src="{{ asset(@$generalSetting->logo) }}" />
                                    </div>
                                </div>

                                {{-- Logo Pie de Pagina --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"
                                        title="{{ __('Logo de pie 400x400px, Blanco, el peso no debe superar 300KB') }}">
                                        {{ __('Logo de Pie') }}
                                    </label>
                                    <div class="col-sm-12 col-md-5">
                                        <div class="custom-file">
                                            <input name="footer_logo" type="file" class="custom-file-input image-upload-footer"
                                                id="customFile">
                                            <label class="custom-file-label" for="customFile">{{ __('Logo Pie de Pagina') }}</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <x-footer-logo-preview src="{{ asset(@$generalSetting->footer_logo) }}" />
                                    </div>
                                </div>

                                {{-- Favicon --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"
                                        title="{{ __('Favicon 32x32px, el peso no debe superar 300KB') }}">
                                        {{ __('Favicon') }}
                                    </label>
                                    <div class="col-sm-12 col-md-5">
                                        <div class="custom-file">
                                            <input name="favicon" type="file" class="custom-file-input image-upload-favicon"
                                                id="customFile">
                                            <label class="custom-file-label" for="customFile">{{ __('Favicon') }}</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <x-favicon-preview src="{{ asset(@$generalSetting->favicon) }}" />
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

@push('child-scripts')
    <script>
        // Mi JS para el manejo de la imagen en la forma
        $(document).ready(function() {

            $('.image-upload').change(function(e) {
                // alert("funciona");
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });

            $('.image-upload-footer').change(function(e) {
                // alert("funciona");
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImageFooter').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });

            $('.image-upload-favicon').change(function(e) {
                // alert("funciona");
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImageFavicon').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });

        });
    </script>
@endpush

<!-- Modal Image Preview -->
@include('admin.vista-previa.image-preview-modal')