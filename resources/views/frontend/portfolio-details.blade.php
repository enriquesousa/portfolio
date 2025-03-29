@extends('frontend.layouts.master')
@section('content')

<header class="site-header parallax-bg">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-sm-8">
                <h2 class="title">{{ __('Detalles Portafolio') }}</h2>
            </div>
            <div class="col-sm-4">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                        <li>{{ __('Detalles Portafolio') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Portfolio-Area-Start -->
<section class="portfolio-details section-padding" id="portfolio-page">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <h2 class="head-title">{{ $portfolio->title }}</h2>

                <figure class="image-block">
                    <img src="{{ asset($portfolio->image) }}" alt="" class="imagen-fix">
                </figure>

                <div class="portflio-info">
                    <div class="single-info">
                        <h4 class="title">{{ __('Cliente') }}</h4>
                        <p>{{ $portfolio->client }}</p>
                    </div>
                    <div class="single-info">
                        <h4 class="title">{{ __('Fecha') }}</h4>
                        <p>{{ formatFechaPortfolioDetails($portfolio->updated_at) }}</p>
                    </div>
                    <div class="single-info">
                        <h4 class="title">{{ __('Sitio Web') }}</h4>
                        <p><a href="{{ $portfolio->website }}" target="_blank">{{ $portfolio->website }}</a></p>
                    </div>
                    <div class="single-info">
                        <h4 class="title">{{ __('Categoría') }}</h4>
                        <p>{{ $portfolio->category->name }}</p>
                    </div>
                </div>

                <div class="description">

                    <h3>{{ __('Captura de imágenes') }}</h3>
                    <p>{{ __('Estas son algunas de las capturas de pantalla del sistema:') }}</p>
	
                    <ul class="gallery">
                        <li><img src="{{ asset($portfolio->foto1) }}" alt="" class="img-fluid w-100"></li>
                        <li><img src="{{ asset($portfolio->foto2) }}" alt="" class="img-fluid w-100"></li>
                    </ul>

                    {!! $portfolio->description !!}
                    
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
                                    <p>Still top of and the drops. What don't issued character god, no ports,
                                        credit question.</p>
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