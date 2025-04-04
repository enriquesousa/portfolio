@extends('admin.layouts.master')
@section('content')

    <section class="section">

        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('dashboard') }}" class="btn btn-icon">
                    <i class="fas fa-arrow-left"></i>
                </a>
            </div>
            @php
                $tituloPagina = __('Registrar Actividad');
                $subTitulo = __('Agregar Actividad para esta sesión');
            @endphp
            <h1>{{ $tituloPagina }}</h1>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header">
                            <h4>{{ $subTitulo }}</h4>
                        </div>

                        <div class="card-body">
                            
                            <div class="row align-items-center g-4">
                                <div class="col-lg">
                                    <div class="container-tight">

                                        {{-- Logo --}}
                                        <div class="text-center mb-1">
                                            <a href="#" class="navbar-brand navbar-brand-autodark">
                                                {{-- <img src="{{ asset('images/logo-small-TJweb-normal.svg') }}" width="100" height="100" alt="Tabler"> --}}
                                                <img src="{{ asset('images/logo-v.png') }}" alt="logo" width="" class="">
                                            </a>
                                        </div>

                                        <div class="card card-md">
                                            <div class="card-body">
            
                                                <form action="{{ route('profile.register-activity.store') }}" method="POST">
                                                    @csrf
            
                                                    <div class="form-group mb-3">
                                                        <textarea class="form-control w-100" style="height: 100px" name="description" placeholder="{{ __('Describe tu actividad en esta sesión') }}" autofocus></textarea>
                                                    </div>
            
                                                    <div class="form-footer">
                                                        <button type="submit" class="btn btn-primary w-100">{{ __('Crear') }}</button>
                                                    </div>
            
                                                </form>
            
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>

                                <div class="col-lg d-none d-lg-block">
                                    <img src="{{ asset('images/computer-fix2.png') }}" height="300"
                                        class="d-block mx-auto" alt="">
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        

    </section>
@endsection
