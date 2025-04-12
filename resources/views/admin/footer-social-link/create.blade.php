@extends('admin.layouts.master')
@section('content')
    <section class="section">

        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.footer-social.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            @php
                $tituloPagina = __('Agregar Red Social');
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

                            <form action="{{ route('admin.footer-social.store') }}" method="POST">
                                @csrf

                                {{-- Bootstrap ICON Picker --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Icono') }}</label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-warning" name="icon" role="iconpicker"></button>
                                    </div>
                                </div>

                                {{-- Nombre --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Nombre') }}</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="name" class="form-control" value="">
                                    </div>
                                </div>

                                {{-- URL --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('URL') }}</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="url" class="form-control" value="">
                                    </div>
                                </div>

                                {{-- Status --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Estado') }}</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select name="status" class="form-control selectric">
                                            <option value="1">{{ __('Activo') }}</option>
                                            <option value="0">{{ __('Inactivo') }}</option>
                                        </select>
                                    </div>
                                </div>
                                

                                {{-- Botón Submit --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary">{{ __('Agregar') }}</button>
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

