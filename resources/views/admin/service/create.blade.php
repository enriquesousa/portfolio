@extends('admin.layouts.master')
@section('content')

    <section class="section">

        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.service.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            @php
                $tituloPagina = __('Sección Servicios');
                $subTituloPagina = __('Agregar Nuevo Servicio');
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
                                <a href="javascript:void(0)" class="btn btn-warning" data-toggle="modal" data-target="#image-preview-modal" data-bs-title="{{ __('Vista Previa') }}" data-image="ImagePreview-Servicios-800x400.png" data-bs-width="480" data-bs-height="428" title="Ver donde queda este titulo en la sección">
                                    <i class="fas fa-eye"></i> {{ __('Vista Previa') }}
                                </a>
                            </div>
                        </div>

                        <div class="card-body"> 
                            <form action="{{ route('admin.service.store') }}" method="POST">
                                @csrf

                                {{-- Nombre Servicio --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" title="Nombre del Servicio">{{ __('Nombre') }}</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="name" class="form-control" autofocus>
                                    </div>
                                </div>

                                {{-- Descripción Servicio --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" title="Descripción del Servicio">{{ __('Descripción') }}</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea name="description" class="form-control" style="height: 100px"></textarea>
                                    </div>                                    
                                </div>

                                {{-- Botón Submit --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary">{{ __('Crear') }}</button>
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