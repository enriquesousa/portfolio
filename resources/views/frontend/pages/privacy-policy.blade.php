@extends('frontend.layouts.master')
@section('content')

<!-- Title and Breadcrumb -->
<header class="site-header parallax-bg">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-sm-8">
                <h2 class="title">{{ __('Política de Privacidad') }}</h2>
            </div>
            <div class="col-sm-4">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                        <li>{{ __('Detalles Política de Privacidad') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Portfolio-Area-Start -->
<section class="portfolio-details section-padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <div class="description">
                    @if (app()->getLocale() == 'en')
                        {!! @$privacyPolicy->content_en !!}
                    @else
                        {!! @$privacyPolicy->content !!}
                    @endif
                </div>

            </div>
        </div>
    </div>
</section>
<!-- Portfolio-Area-End -->



@endsection