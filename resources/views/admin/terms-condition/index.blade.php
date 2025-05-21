@extends('admin.layouts.master')
@section('content')
    <section class="section">

        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('dashboard') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            @php
                $tituloPagina = __('Términos y Condiciones');
                $subTituloPagina = __('Actualizar Términos y Condiciones');
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
                                <a href="javascript:void(0)" class="btn btn-warning" data-toggle="modal" data-target="#image-preview-modal" data-bs-title="{{ __('Vista Previa') }}" data-image="Portfolio_terminosCondiciones_opt_700.png" data-bs-width="480" data-bs-height="428" title="Ver donde queda este titulo en la sección">
                                    <i class="fas fa-eye"></i> {{ __('Vista Previa') }}
                                </a>
                            </div>
                        </div>

                        <div class="card-body">

                            <form action="{{ route('admin.terms-and-conditions.update', 1) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                {{-- Descripción Contenido --}}
                                <div class="form-group row mb-4">
                                    <div class="col-sm-12">
                                        <label for="content">{{ __('Contenido') }}</label>
                                        <textarea name="content" class="summernote" style="height: 100px; width: 100%">{!! @$termsCondition->content !!}</textarea>
                                    </div>
                                </div>
                                    

                                {{-- Botón Actualizar --}}
                                <div class="form-group row mb-4">
                                    <div class="col-sm-12 text-center">
                                        <button type="submit" name="submit" class="btn btn-primary" value="Actualizar">{{ __('Actualizar') }}</button>
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


