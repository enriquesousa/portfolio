@extends('frontend.layouts.master')
@section('content')

{{-- css script --}}
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

                <!-- Titulo del blog -->
                <h2 class="head-title">{{ $blog->title }}</h2>

                <!-- Fecha de Publicación, Categoría y Comentarios -->
                <div class="blog-meta">
                    <div class="single-meta">
                        <div class="meta-title">{{ __('Publicado') }}</div>
                        <h4 class="meta-value">
                            <a href="javascript:void(0);">
                                {{ formatFechaPortfolioDetails($blog->updated_at) }}
                            </a>
                        </h4>
                    </div>
                    <div class="single-meta">
                        <div class="meta-title">{{ __('Categoría') }}</div>
                        <h4 class="meta-value">
                            <a href="#">{{ $blog->getCategory->name }}</a>
                        </h4>
                    </div>
                    {{-- <div class="single-meta">
                        <div class="meta-title">Comments</div>
                        <h4 class="meta-value">258 Comments</h4>
                    </div> --}}
                </div>

                <!-- Imagen -->
                <figure class="image-block">
                    <img class="imagen-fix" src="{{ asset($blog->image) }}" alt="">
                </figure>

                <!-- Contenido del blog -->
                <div class="description">
                    {!! markdownToHtml($blog->description) !!}
                    {{-- {!! Blade::render(markdownToHtml($blog->description));  !!} --}}
                </div>

                <!-- Navegación del blog -->
                <div class="single-navigation">
                    <a href="#" class="nav-link"><span class="icon"><i
                                class="fal fa-angle-left"></i></span><span class="text">America National Parks
                            With Denver.</span></a>
                    <a href="#" class="nav-link"><span class="text">A Seaside Reset In Laguna Beach.</span><span
                            class="icon"><i class="fal fa-angle-right"></i></span></a>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- Portfolio-Area-End -->

<!-- Quote-Area-Start -->
<section class="quote-area section-padding-bottom">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="quote-box">
                    <div class="row ">
                        <div class="col-lg-6 offset-lg-3">
                            <div class="quote-content">
                                <h3 class="title">Your Journey Today</h3>
                                <div class="desc">
                                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptate rem
                                        maiores, neque at officiis laudantium.</p>
                                </div>
                                <a href="#" class="button-orange mouse-dir">Get Started <span
                                        class="dir-part"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Quote-Area-End -->

@endsection