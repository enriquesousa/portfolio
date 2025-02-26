@extends('admin.layouts.master')
@section('content')
    <section class="section">

        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route($paginaRegreso, [$previaTitulo, $previaImagen, $paginaRegreso]) }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>{{ $previaTitulo }}</h1>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header">
                            {{-- <h4>Sección Vista Previa - Titulo Maquina (Type Writer)</h4> --}}
                        </div>

                        <div class="card-body">

                            <div class="text-center">

                                <center> <!-- Center the image and content -->
                                    <img src="{{ asset('frontend/assets/images/'.$previaImagen) }}" style="width: 800px; height: 400px;" alt="Hero Image">
                                </center>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
