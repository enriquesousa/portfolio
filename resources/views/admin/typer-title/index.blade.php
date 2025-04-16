@extends('admin.layouts.master')
@section('content')

    <section class="section">

        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('dashboard') }}" class="btn btn-icon">
                    <i class="fas fa-arrow-left"></i>
                </a>
            </div>
            <h1>{{ __('Sección Héroe - Titulo Maquina (Type Writer)') }}</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header">

                            <h4>{{ __('Todos los Títulos') }}</h4>

                            <div class="card-header-action">

                                <!-- Botón Vista Modal -->
                                <a href="javascript:void(0)" class="btn btn-info" data-toggle="modal" data-target="#image-preview-modal" data-bs-title="{{ __('Vista Previa - Typer Title') }}" data-image="heroVistaPrevia-elementos-800x400.png" data-bs-width="480" data-bs-height="428" title="Ver donde queda este titulo en la sección">
                                    <i class="fas fa-eye"></i> {{ __('Vista Previa') }}
                                </a>

                                <!-- Botón Vista Previa -->
                                {{-- <a href="{{ route('admin.vista-previa.index',['Sección Vista Previa - Titulo Maquina (Type Writer)', 'heroVistaPrevia-tituloPagina-800x400.png', 'admin.typer-title.index']) }}" class="btn btn-warning" title="Ver donde queda este titulo en la sección">
                                    <i class="fas fa-eye"></i> {{ __('Vista Previa') }}
                                </a> --}}

                                <!-- Botón Agregar -->
                                <a href="{{ route('admin.typer-title.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> {{ __('Agregar Titulo') }}
                                </a>

                            </div>

                        </div>

                        <div class="card-body">
                            
                            {{ $dataTable->table() }}

                        </div>
                    </div>
                </div>
            </div>
        </div>

        

    </section>
@endsection

<!-- Modal -->
<div class="modal fade" id="image-preview-modal" tabindex="-1" aria-labelledby="image-preview-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="GET" class="modal-form">
                    @csrf

                    <input type="hidden" name="imagenInput" id="imagenInput" value="heroVistaPrevia-480x228.png">

                    <div class="row">
                        <img src="" alt="PreviewImage" class="img-center" id="previewImageModal">
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

@push('child-scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush

