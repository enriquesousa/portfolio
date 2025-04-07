@extends('admin.layouts.master')
@section('content')
    <section class="section">

        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.portfolio-item.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            @php
                $tituloPagina = __('Editar Blog');
            @endphp
            <h1>{{ $tituloPagina }}</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ $tituloPagina }}</h4>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                {{-- Imagen Foto --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" title="Tamaño recomendado: 540x330px, el tamaño de la imagen no debe superar los 300KB">{{ __('Imagen') }}</label>
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

                                {{-- Descripción --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Descripción') }}</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea name="description" class="summernote" style="height: 100px; width: 100%">
                                        {{-- <textarea name="description" class="" style="height: 300px; width: 100%"> --}}
                                            {!! $blog->description !!}
                                        </textarea>
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
                'background-image': 'url("{{ asset($blog->image) }}")',
                'background-size': 'cover',
                'background-position': 'center center'
            })

        });
    </script>
@endpush
