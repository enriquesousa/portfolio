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
                                <a href="{{ route('admin.vista-previa.index', ['Sección Héroe - Vista Previa', 'hero_section_800x400_conTitulos.png', 'admin.hero.index']) }}"
                                    class="btn btn-secondary" title="Ver donde quedan estos elementos en la sección">
                                    <i class="fas fa-eye"></i> Vista Previa
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
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Imagen</label>
                                    <div class="col-sm-12 col-md-7">
                                        <div id="image-preview" class="image-preview">
                                            <label for="image-upload" id="image-label">Seleccione imagen</label>
                                            <input type="file" name="image" id="image-upload" />
                                        </div>
                                    </div>
                                </div>

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


                                {{-- PDF Icono --}}
                                @if ($about->resume)
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                        <div class="col-sm-12 col-md-7">
                                            <div>
                                                <i class="fas fa-file-pdf" style="font-size: 100px;"></i>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                {{-- Seleccionar PDF Currículo Vitae --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Currículo Vitae</label>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="custom-file">
                                            <input type="file" name="resume" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Seleccione PDF</label>
                                        </div>
                                    </div>
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
