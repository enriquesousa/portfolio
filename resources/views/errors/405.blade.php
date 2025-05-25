@extends('frontend.layouts.master')

@section('content')

    <header class="site-header parallax-bg">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-sm-8">
                    <h2 class="title">405</h2>
                </div>
                <div class="col-sm-4">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                            <li>405</li>
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
                <div id="notfound">
                    <div class="notfound">

                        <div class="notfound-404">
                            <h1 style="background-image: url({{ asset('frontend/assets/images/bg.jpg') }})">Oops!</h1>
                        </div>

                        {{-- Leer locale_general_user de la base de datos --}}
                        @php
                            $generalSetting = \App\Models\GeneralSetting::first();
                            $locale = $generalSetting->locale_general_user;
                        @endphp
                        
                        @if ($locale == 'en')
                            <h2>{{ '405 - Method Not Allowed' }}</h2>
                            <p>{{ 'Method Not Allowed' }}</p>
                            <a href="{{ url('/') }}">{{ 'Go to the homepage' }}</a>
                        @elseif($locale == 'es')
                            <h2>{{ __('405 - Método No Permitido') }}</h2>
                            <p>{{ __('Método No Permitido') }}</p>
                            <a href="{{ url('/') }}">{{ __('Ir a la página de inicio') }}</a>
                        @else
                            <h2>{{ __('405 - Método No Permitido') }}</h2>
                            <p>{{ __('Método No Permitido') }}</p>
                            <a href="{{ url('/') }}">{{ __('Ir a la página de inicio') }}</a>
                        @endif

                        

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Portfolio-Area-End -->

@endsection

