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
                $tituloPagina = 'Portafolio - Categorías';
            @endphp
            <h1>{{ $tituloPagina }}</h1>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header">

                            <h4>Todas las categorías</h4>

                            <div class="card-header-action">

                                <!-- Botón Vista Previa -->
                                <a href="{{ route('admin.vista-previa.index',['Sección - '.$tituloPagina, 'heroVistaPrevia-tituloPagina-800x400.png', 'admin.category.index']) }}" class="btn btn-secondary" title="Ver donde queda este titulo en la sección">
                                    <i class="fas fa-eye"></i> Vista Previa
                                </a>

                                <!-- Botón Agregar -->
                                <a href="{{ route('admin.category.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> Agregar
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

@push('child-scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush

