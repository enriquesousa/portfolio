@extends('admin.layouts.master')
@section('content')

    <section class="section">

        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.typer-title.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Sección Héroe - Titulo Maquina (Type Writer)</h1>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header">
                            <h4>{{ __('Editar Titulo Maquina') }}</h4>
                            <div class="card-header-action">
                                <!-- Botón Vista Modal -->
                                <a href="javascript:void(0)" class="btn btn-warning" data-toggle="modal" data-target="#image-preview-modal" data-bs-title="{{ __('Vista Previa') }}" data-image="ImagePreview-Hero-TyperTitle-800x400.png" data-bs-width="480" data-bs-height="428" title="Ver donde queda este titulo en la sección">
                                    <i class="fas fa-eye"></i> {{ __('Vista Previa') }}
                                </a>
                            </div>
                        </div>

                        <div class="card-body">

                            <form action="{{ route('admin.typer-title.update', $typerTitle->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                {{-- Titulo --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Titulo</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="title" class="form-control" value="{{ $typerTitle->title }}">
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

<!-- Modal Image Preview -->
@include('admin.vista-previa.image-preview-modal')