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

                                <!-- Botón Vista Previa -->
                                <a href="{{ route('admin.vista-previa.index',['Sección Vista Previa - Titulo Maquina (Type Writer)', 'heroVistaPrevia-tituloPagina-800x400.png', 'admin.typer-title.index']) }}" class="btn btn-warning" title="Ver donde queda este titulo en la sección">
                                    <i class="fas fa-eye"></i> {{ __('Vista Previa') }}
                                </a>

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

@push('child-scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush

