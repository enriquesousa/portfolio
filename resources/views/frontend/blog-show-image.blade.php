@extends('frontend.layouts.master')
@section('content')

<!-- css script -->
@push('child-styles')
    <!-- Mi Custom CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/blog-details.css') }}">
@endpush


<header class="site-header parallax-bg">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-sm-8">
                <h2 class="title">{{ __('Detalles Blog') }}</h2>
            </div>
            <div class="col-sm-4">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                        <li>{{ __('Blog') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Portfolio-Area-Start -->
<section class="blog-details section-padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <!-- Contenido del blog -->
                <div class="description">
                    <!-- Show image -->
                    <img class="imagen-fix" src="{{ asset('images/blog/'.$blogImage) }}" alt="blogImage">
                </div>

            </div>
        </div>
    </div>
</section>
<!-- Portfolio-Area-End -->

@endsection