@extends('admin.layouts.master')
@section('content')
    <section class="section">

        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('dashboard') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            @php
                $tituloPagina = __('Sección Acerca de Mi');
                $subTituloPagina = __('Actualizar Sección Acerca de Mi');
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
                                <a href="javascript:void(0)" class="btn btn-warning" data-toggle="modal" data-target="#image-preview-modal" data-bs-title="{{ __('Vista Previa') }}" data-image="about_opt_600.png" data-bs-width="480" data-bs-height="428" title="Ver donde queda este titulo en la sección">
                                    <i class="fas fa-eye"></i> {{ __('Vista Previa') }}
                                </a>
                            </div>
                        </div>

                        <div class="card-body">

                            <form action="{{ route('admin.about.update', 1) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')


                                {{-- Imagen Foto --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" title="Tamaño recomendado: 550x550, el tamaño de la imagen no debe superar los 1MB">{{ __('Imagen') }}</label>
                                    <div class="col-sm-12 col-md-7">
                                        <div id="image-preview" class="image-preview">
                                            <label for="image-upload" id="image-label">{{ __('Seleccione imagen') }}</label>
                                            <input type="file" name="image" id="image-upload" />
                                        </div>
                                    </div>
                                </div>

                                {{-- Titulo --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Titulo') }}</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="title" class="form-control"
                                            value="{{ $about->title }}">
                                    </div>
                                </div>

                                {{-- Descripción --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Descripción') }}</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea name="description" class="summernote" style="height: 100px; width: 100%">{!! $about->description !!}</textarea>
                                    </div>
                                </div>

                                {{-- Descripción en Ingles --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Descripción Ingles') }}</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea name="description_en" class="summernote" style="height: 100px; width: 100%">{!! $about->description_en !!}</textarea>
                                    </div>
                                </div>
                                
                             
                                {{-- Subir Archivo PDF --}}
                                {{-- <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" title="Subir archivo, el formato debe ser PDF, csv, doc o docx, el tamaño no debe superar los 2MB">{{ __('Subir Archivo PDF') }}</label>

                                    <div class="col-sm-12 col-md-4">
                                        <div class="custom-file">
                                            <input type="file" name="resume" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile" title="Seleccione un archivo, el formato debe ser PDF, csv o txt, el tamaño no debe superar los 5MB">{{ __('Seleccione PDF') }}</label>
                                        </div>
                                    </div>

                                    <!-- Si hay archivo subido, mostrar icono pdf y botón para eliminar -->
                                    @if ($about->resume)
                                        <div class="col-sm-12 col-md-3">
                                            <div>
                                                <i class="fas fa-file-pdf" style="font-size: 40px;"></i>&nbsp;&nbsp;
                                                <button type="submit" name="submit" class="btn btn-danger" style="margin-top: -20px" value="Eliminar">{{ __('Eliminar Archivo') }}</button>
                                            </div>
                                        </div>
                                    @endif

                                </div> --}}
                                    

                                {{-- Botón Actualizar --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button type="submit" name="submit" class="btn btn-primary" value="Actualizar">{{ __('Actualizar') }}</button>
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
        $(document).ready(function(){

            // Mi JS para el manejo de la imagen en la forma
            $('#image-preview').css({
                'background-image': 'url("{{asset($about->image)}}")',
                'background-size': 'cover',
                'background-position': 'center center'
            })

        });
    </script>
@endpush
