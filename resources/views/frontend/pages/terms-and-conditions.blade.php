@extends('frontend.layouts.master')
@section('content')

<!-- Title and Breadcrumb -->
<header class="site-header parallax-bg">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-sm-8">
                <h2 class="title">{{ __('Términos y Condiciones') }}</h2>
            </div>
            <div class="col-sm-4">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                        <li>{{ __('Detalles Términos y Condiciones') }}</li>
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
                        {!! @$termsCondition->content_en !!}
                    @else
                        {!! @$termsCondition->content !!}
                    @endif
                </div>

            </div>
        </div>
    </div>
</section>
<!-- Portfolio-Area-End -->



@endsection