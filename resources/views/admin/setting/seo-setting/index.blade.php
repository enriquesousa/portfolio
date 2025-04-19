@extends('admin.layouts.master')
@section('content')
    <section class="section">

        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.settings.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            @php
                $tituloPagina = __('Configurar SEO');
                $subtituloPagina = __('Configurar SEO (Search Engine Optimization)');
                $cardHeader = __('Configurar SEO');
            @endphp
            <h1>{{ $tituloPagina }}</h1>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">

                    <h2 class="section-title">{{ $subtituloPagina }}</h2>
                    <p class="section-lead">
                        {{ __('SEO es la sigla en inglés de Search Engine Optimization (optimización para motores de búsqueda) y es una práctica que consiste en optimizar tus páginas web para que se posicionen mejor en las páginas de resultados de los motores de búsqueda (SERP).El SEO es una estrategia de marketing eficaz y económica que ayuda a atraer tráfico a un sitio web y a aumentar las tasas de conversión.') }}
                    </p>

                    <div class="card">

                        <div class="card-header">
                            <h4>{{ $cardHeader }}</h4>
                            <div class="card-header-action">
                                
                            </div>
                        </div>

                        <div class="card-body">

                            <form action="{{ route('admin.seo-setting.update', 1) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                {{-- Titulo --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Titulo SEO') }}</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="title" class="form-control" value="{{ @$seoSetting->title }}">
                                    </div>
                                </div>

                                {{-- Descripción --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Descripción SEO') }}</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea name="description" id="" class="form-control" style="height: 100px">{{ @$seoSetting->description }}</textarea>
                                    </div>
                                </div>

                                {{-- Keywords --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Palabras Claves SEO') }}</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="keywords" class="form-control" value="{{ @$seoSetting->keywords }}">
                                        <code style="font-size: 12px; font-style: italic">{{ __('Palabras Claves Separadas por Comas') }}</code>
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
        });
    </script>
@endpush
