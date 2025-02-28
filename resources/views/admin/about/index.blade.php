@extends('admin.layouts.master')
@section('content')
    <section class="section">

        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('dashboard') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Sección Acerca de Mi</h1>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header">

                            <h4>Actualizar Sección Acerca de Mi</h4>

                            <div class="card-header-action">

                                <!-- Button trigger modal -->
                                <a href="{{ route('admin.vista-previa.index',['Sección Héroe - Vista Previa', 'hero_section_800x400_conTitulos.png', 'admin.hero.index']) }}" class="btn btn-secondary" title="Ver donde quedan estos elementos en la sección">
                                    <i class="fas fa-eye"></i> Vista Previa
                                </a>

                            </div>

                        </div>

                        <div class="card-body">

                            <form action="{{ route('admin.about.update', 1) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                {{-- Titulo --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Titulo</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="title" class="form-control"
                                            value="{{ $about->title }}">
                                    </div>
                                </div>

                                {{-- Descripción --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Descripción</label>
                                    <div class="col-sm-12 col-md-7">
                                      <textarea name="description" class="summernote" style="height: 100px; width: 100%">{!! $about->description !!}</textarea>
                                    </div>
                                </div>
                                {{-- <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Descripción</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea name="description" id="" class="form-control" style="height: 100px">{{ $about->description }}</textarea>
                                    </div>
                                </div> --}}

                                {{-- Resumen --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Resumen</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea name="resume" id="" class="form-control" style="height: 100px">{{ $about->resume }}</textarea>
                                    </div>
                                </div>

                                {{-- Imagen Foto --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"
                                        title="Seleccione una imagen o fotografía, el tamaño debe ser de 550x550 y el peso no debe superar 1MB">Imagen</label>
                                    <div class="col-sm-12 col-md-3">
                                        <div class="custom-file">
                                            <input name="image" type="file" class="custom-file-input image-upload"
                                                id="customFile">
                                            <label class="custom-file-label" for="customFile">Seleccionar imagen</label>
                                        </div>
                                    </div>
                                    @if ($about->image)
                                        <div class="col-sm-12 col-md-3">
                                            <x-image-preview-image src="{{ asset($about->image) }}" />
                                        </div>
                                    @else
                                        <div class="col-sm-12 col-md-3">
                                            <x-image-preview-image src="" />
                                        </div>
                                    @endif
                                </div>

                                {{-- Botón Submit --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary">Actualizar</button>
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
