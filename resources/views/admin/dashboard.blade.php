@extends('admin.layouts.master')
@section('content')

    <section class="section">

        <div class="section-header">
            <h1>{{ __('Dashboard') }}</h1>
        </div>

        <div class="row">

            <!-- Total Blogs -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fab fa-blogger"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>{{ __('Total de Blogs') }}</h4>
                        </div>
                        <div class="card-body">
                            {{ $totalBlogs }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Skills | Habilidades -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-id-card"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>{{ __('Total de Habilidades') }}</h4>
                        </div>
                        <div class="card-body">
                            {{ $totalSkills }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Porfolio -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-newspaper"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>{{ __('Total de Portafolio') }}</h4>
                        </div>
                        <div class="card-body">
                            {{ $totalPorfolio }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Feedbacks | Comentarios -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>{{ __('Total de Comentarios') }}</h4>
                        </div>
                        <div class="card-body">
                            {{ $totalFeedback }}
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>

@endsection