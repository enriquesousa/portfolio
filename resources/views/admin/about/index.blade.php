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
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" title="Tamaño recomendado: 550x550, el tamaño de la imagen no debe superar los 1MB">Imagen</label>
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
                                
                             
                                {{-- Subir Archivo PDF --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" title="Subir archivo, el formato debe ser PDF, csv, doc o docx, el tamaño no debe superar los 2MB">Subir PDF</label>

                                    <div class="col-sm-12 col-md-4">
                                        <div class="custom-file">
                                            <input type="file" name="resume" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile" title="Seleccione un archivo, el formato debe ser PDF, csv o txt, el tamaño no debe superar los 5MB">Seleccione PDF</label>
                                        </div>
                                    </div>

                                    {{-- Si hay archivo subido, mostrar icono pdf y botón para eliminar --}}
                                    @if ($about->resume)
                                        <div class="col-sm-12 col-md-3">
                                            <div>
                                                <i class="fas fa-file-pdf" style="font-size: 40px;"></i>&nbsp;&nbsp;
                                                <button type="submit" name="submit" class="btn btn-danger" style="margin-top: -20px" value="Eliminar">Eliminar Archivo</button>
                                            </div>
                                        </div>
                                    @endif

                                </div>
                                    

                                {{-- Botón Actualizar --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button type="submit" name="submit" class="btn btn-primary" value="Actualizar">Actualizar</button>
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
                'background-image': 'url("{{asset($about->image)}}")',
                'background-size': 'cover',
                'background-position': 'center center'
            })

        });
    </script>
@endpush
