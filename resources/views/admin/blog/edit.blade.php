@extends('admin.layouts.master')
@section('content')
    <section class="section">

        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.blog.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            @php
                $tituloPagina = __('Editar Blog');
                $subHeader = __('Editar Blog Editare el Blog');
            @endphp
            <h1>{{ $tituloPagina }}</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header">
                            <h4>{{ $subHeader }}</h4>
                            <div class="card-header-action">
                                <!-- Botón Vista Modal -->
                                <a href="javascript:void(0)" class="btn btn-warning" data-toggle="modal" data-target="#image-preview-modal" data-bs-title="{{ __('Vista Previa') }}" data-image="ImagePreview-Blog-Descripcion-800x582.png" data-bs-width="480" data-bs-height="428" title="Ver donde queda este titulo en la sección">
                                   <i class="fas fa-eye"></i> {{ __('Vista Previa') }}
                               </a>
                           </div>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                {{-- Imagen Foto --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" title="Tamaño recomendado: 540x330px, el tamaño de la imagen no debe superar los 100KB">{{ __('Imagen') }}</label>
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
                                        <input type="text" name="title" class="form-control" value="{{ $blog->title }}">
                                    </div>
                                </div>

                                {{-- Seleccionar Categoría --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                        {{ __('Seleccionar Categoría') }}
                                    </label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" name="category">
                                            <option>{{ __('Seleccionar') }}</option>
                                            @foreach ($categories as $category)
                                                <option {{ $category->id == $blog->category ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{-- Status --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Estado') }}</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select name="status" class="form-control selectric">
                                            <option {{ $blog->status == 1 ? 'selected' : '' }} value="1">{{ __('Activo') }}</option>
                                            <option {{ $blog->status == 0 ? 'selected' : '' }} value="0">{{ __('Inactivo') }}</option>
                                        </select>
                                    </div>
                                </div>

                                {{-- Descripción --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Descripción') }}</label>
                                    <div class="col-sm-12 col-md-7">
                                        {{-- <textarea name="description" class="summernote" style="height: 100px; width: 100%"> --}}
                                        <textarea name="description" class="" style="height: 300px; width: 100%">
                                            {!! $blog->description !!}
                                        </textarea>
                                    </div>
                                </div>

                                {{-- Imágenes foto1 y foto2 para desplegar al final del blog --}}
                                <div class="form-group row mb-4 fotos">

                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" title="Tamaño recomendado: ancho de 800px, el tamaño de la imagen no debe superar los 100KB">{{ __('Fotos') }}</label>

                                    {{-- <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label> --}}

                                    <p class="col-sm-12 col-md-7">{{ __('Imágenes colocar al final del blog') }}, {{ __('Tamaño recomendado: ancho de 800px, el tamaño de la imagen no debe superar los 100KB') }}</p>
                                    

                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" title="Tamaño recomendado: ancho de 800px, el tamaño de la imagen no debe superar los 100KB">{{ __('Foto1') }}</label>
                                    {{-- foto1 --}}
                                    <div class="col-sm-12 col-md-7 foto">
                                        <label for="image-upload-foto1" class="form-label" title="Subir imagen" style="cursor: pointer">
                                            <img for="image-upload-foto1" id="showImage-foto1" src="{{ !empty($blog->foto1) ? url($blog->foto1) : url('images/no_image.jpg') }}" alt="foto1">
                                        </label>                                        
                                        <input type="file" id="image-upload-foto1" name="foto1" hidden=""> 
                                    </div>

                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" title="Tamaño recomendado: ancho de 800px, el tamaño de la imagen no debe superar los 100KB">{{ __('Foto2') }}</label>
                                    {{-- foto2 --}}
                                    <div class="col-sm-12 col-md-3 foto">
                                        
                                        <label for="image-upload-foto2" class="form-label" title="Subir imagen" style="cursor: pointer">
                                            <img for="image-upload-foto2" id="showImage-foto2" src="{{ !empty($blog->foto2) ? url($blog->foto2) : url('images/no_image.jpg') }}" alt="foto2">
                                        </label>                                        
                                        <input type="file" id="image-upload-foto2" name="foto2" hidden=""> 

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

<!-- Modal Image Preview -->
@include('admin.vista-previa.image-preview-modal')

@push('child-scripts')
    <script>
        $(document).ready(function(){

            // Mi JS para el manejo de la imagen en la forma
            $('#image-preview').css({
                'background-image': 'url("{{ asset($blog->image) }}")',
                // 'background-size': 'cover',
                'background-size': 'contain',
                'background-repeat': 'no-repeat',
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
