@extends('admin.layouts.master')
@section('content')

    <section class="section">

        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ redirect()->back()->getTargetUrl() }}" title="{{ __('Página Anterior') }}" class="btn btn-icon">
                    <i class="fas fa-arrow-left"></i>
                </a>
            </div>
            @php
                $tituloPagina = __('Redes Sociales');
                $subTituloPagina = __('Todas las Redes Sociales');
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
                                <a href="javascript:void(0)" class="btn btn-warning" data-toggle="modal" data-target="#image-preview-modal" data-bs-title="{{ __('Vista Previa') }}" data-image="ImagePreview-Footer-RedesSociales-800x289.png" data-bs-width="480" data-bs-height="428" title="Ver donde queda este titulo en la sección">
                                    <i class="fas fa-eye"></i> {{ __('Vista Previa') }}
                                </a>
                                <!-- Botón Agregar -->
                                <a href="{{ route('admin.footer-social.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> {{ __('Agregar') }}
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            
                            {{-- Nombre de la dataTable: FooterSocialLinkDataTable --}}
                            {{ $dataTable->table() }}

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
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush

