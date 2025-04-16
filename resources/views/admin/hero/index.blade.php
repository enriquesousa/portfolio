@extends('admin.layouts.master')
@section('content')
    <section class="section">

        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('dashboard') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>{{ __('Sección Héroe') }}</h1>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header">
                            <h4>{{ __('Actualizar Sección Héroe') }}</h4>
                            <div class="card-header-action">
                                <!-- Botón Vista Modal -->
                                <a href="javascript:void(0)" class="btn btn-info" data-toggle="modal" data-target="#image-preview-modal" data-bs-title="{{ __('Vista Previa') }}" data-image="ImagePreview-Hero-800x400.png" data-bs-width="480" data-bs-height="428" title="Ver donde queda este titulo en la sección">
                                    <i class="fas fa-eye"></i> {{ __('Vista Previa') }}
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.hero.update', 1) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                {{-- Titulo --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Titulo') }}</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="title" class="form-control"
                                            value="{{ $hero->title }}">
                                    </div>
                                </div>

                                {{-- Sub Titulo --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Sub-Titulo') }}</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea name="sub_title" id="" class="form-control" style="height: 100px">{{ $hero->sub_title }}</textarea>
                                    </div>
                                </div>

                                {{-- Botón Texto --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"
                                        title="{{ __('Texto que se mostrara en el botón, dejar en blanco para no mostrar el botón') }}">
                                        {{ __('Texto del Botón') }}
                                    </label>
                                    <div class="col-sm-12 col-md-7">
                                        <input name="btn_text" type="text" class="form-control"
                                            value="{{ $hero->btn_text }}">
                                    </div>
                                </div>

                                {{-- Botón Url --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                        {{ __('URL del Botón') }}
                                    </label>
                                    <div class="col-sm-12 col-md-7">
                                        <input name="btn_url" type="text" class="form-control" value="{{ $hero->btn_url }}">
                                    </div>
                                </div>

                                {{-- Imagen de Fondo --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"
                                        title="{{ __('Seleccione una imagen de fondo, el tamaño debe ser de 1850x850 y el peso no debe superar 1MB') }}">
                                        {{ __('Imagen de Fondo') }}
                                    </label>
                                    <div class="col-sm-12 col-md-3">
                                        <div class="custom-file">
                                            <input name="image" type="file" class="custom-file-input image-upload"
                                                id="customFile">
                                            <label class="custom-file-label" for="customFile">{{ __('Seleccionar imagen') }}</label>
                                        </div>
                                    </div>
                                    @if ($hero->image)
                                        <div class="col-sm-12 col-md-3">
                                            <x-image-preview-hero src="{{ asset($hero->image) }}" />
                                        </div>
                                    @else
                                        <div class="col-sm-12 col-md-3">
                                            <x-image-preview-hero src="" />
                                        </div>
                                    @endif
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
        });
    </script>
@endpush
