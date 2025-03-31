@extends('admin.layouts.master')
@section('content')
    <section class="section">

        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.portfolio-item.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>{{ __('Editar Articulo de Portafolio') }}</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ __('Editar Articulo de Portafolio') }}</h4>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.portfolio-item.update', $portfolioItem->id ) }}" method="POST" enctype="multipart/form-data">
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

                                {{-- Imágenes foto1 y foto2 se usan como encabezado para portfolio details --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <p class="col-sm-12 col-md-7">{{ __('ImágenesPara el encabezado de los detalles de portafolio') }}</p>
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" title="Tamaño recomendado: 550x550, el tamaño de la imagen no debe superar los 1MB">{{ __('Fotos') }}</label>

                                    <div class="col-sm-12 col-md-3">
                                        <label for="image-upload-foto1" class="form-label" title="Subir imagen, tamaño recomendado: 540x330px el tamaño de la imagen no debe superar 300KB" style="cursor: pointer">
                                            <img for="image-upload-foto1" id="showImage-foto1" src="{{ !empty($portfolioItem->foto1) ? url($portfolioItem->foto1) : url('images/no_image.jpg') }}" alt="foto1" class="image-preview-kazy">
                                        </label>                                        
                                        <input type="file" id="image-upload-foto1" name="foto1" hidden=""> 
                                    </div>

                                    <div class="col-sm-12 col-md-3">
                                        <label for="image-upload-foto2" class="form-label" title="Subir imagen, tamaño recomendado: 540x330px el tamaño de la imagen no debe superar 300KB" style="cursor: pointer">
                                            <img for="image-upload-foto2" id="showImage-foto2" src="{{ !empty($portfolioItem->foto2) ? url($portfolioItem->foto2) : url('images/no_image.jpg') }}" alt="foto2" class="image-preview-kazy">
                                        </label>                                        
                                        <input type="file" id="image-upload-foto2" name="foto2" hidden=""> 
                                    </div>

                                </div>

                                {{-- Titulo --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Titulo') }}</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="title" class="form-control" value="{{ $portfolioItem->title }}">
                                    </div>
                                </div>

                                {{-- Seleccionar Categoría --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                        {{ __('Seleccionar Categoría') }}
                                    </label>
                                    <div class="col-sm-12 col-md-7">
                                        <select name="category_id" id="" class="form-control selectric">
                                            <option value="">{{ __('Seleccionar Categoría') }}</option>
                                            @foreach ($categories as $category)
                                                <option @selected($portfolioItem->category_id === $category->id) value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{-- Descripción --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Descripción') }}</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea name="description" class="summernote" style="height: 100px; width: 100%">{!! $portfolioItem->description !!}</textarea>
                                    </div>
                                </div>
                                    
                                {{-- Cliente --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Cliente') }}</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="client" class="form-control" value="{{ $portfolioItem->client }}">
                                    </div>
                                </div>

                                {{-- website --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Sitio Web') }}</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="website" class="form-control" value="{{ $portfolioItem->website }}">
                                    </div>
                                </div>


                                {{-- Botón Actualizar --}}
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
        $(document).ready(function(){

            // Mi JS para el manejo de la imagen en la forma
            $('#image-preview').css({
                'background-image': 'url({{ asset($portfolioItem->image) }})',
                'background-size': 'cover',
                'background-position': 'center center'
            })

            // Mi JS para el manejo de la imagen en la forma (Modo Directo Kazy)
            $('#image-upload-foto1').change(function(e) {
                // alert("funciona");
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage-foto1').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });

            $('#image-upload-foto2').change(function(e) {
                // alert("funciona");
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage-foto2').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });

        });
    </script>
@endpush
