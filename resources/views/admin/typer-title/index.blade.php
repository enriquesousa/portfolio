@extends('admin.layouts.master')
@section('content')

    <section class="section">

        <div class="section-header">
            <div class="section-header-back">
                <a href="features-posts.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Sección Héroe - Titulo Maquina (Type Writer) </h1>
        </div>

        <div class="section-body">

            {{-- Accordion Vista Previa --}}
            <div id="accordion">
                <div class="accordion">
                    <div class="accordion-header collapsed bg-primary text-light p-3" role="button" data-toggle="collapse" data-target="#panel-body-2" aria-expanded="true">
                        <h4>Vista Previa</h4>
                    </div>
                    <div class="accordion-body collapse hide" id="panel-body-2" data-parent="#accordion"
                        style="">
                        {{-- <img src="{{ asset('frontend/assets/images/hero_section_800x400.png') }}" alt="" class="img-fluid w-100"> --}}
                        <img src="{{ asset('frontend/assets/images/hero_section_800x400_conTitulos.png') }}" style="width: 800px; height: 400px;" alt="Hero Image">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header">
                            <h4>Todos los Títulos</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.typer-title.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> Nuevo Titulo
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

