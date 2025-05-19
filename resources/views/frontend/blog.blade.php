@extends('frontend.layouts.master')
@section('content')

<header class="site-header parallax-bg">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-sm-7">
                <h2 class="title">Blog</h2>
            </div>
            <div class="col-sm-5">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                        <li>Blog</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Portfolio-Area-Start -->
<section class="blog-area section-padding">
    <div class="container">

        <!-- Menu Buscar -->
        <form class="fp__search_menu_form mb-5" action="{{ route('show.blogs') }}" method="GET">
            <div class="row">

                <!-- Buscar -->
                <div class="col-xl-6 col-md-5">
                    <input type="text" placeholder="{{ __('Search') }}..." name="search" value="{{ @request()->search }}">
                </div>

                <!-- Seleccionar Categoría -->
                <div class="col-xl-4 col-md-4">
                    <select class="nice-select" name="category">
                        <option value="">{{ __('Todas las categorías') }}</option>
                        @foreach ($categories as $category)
                            <option @selected(@request()->category == $category->slug) value="{{ $category->slug }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Boton Buscar -->
                <div class="col-xl-2 col-md-3">
                    <button type="submit" class="">{{ __('Search') }}</button>
                </div>

            </div>
        </form>

        <!-- Lista de Blogs -->
        <div class="row">

            @foreach ($blogs as $blog)                 
                <div class="col-xl-4 col-md-6">
                    <div class="single-blog">
                        <figure class="blog-image">
                            <a class="icon-link text-white" href="{{ route('show.blog', $blog->id) }}">
                                <img src="{{ asset($blog->image) }}" alt="">
                            </a>
                        </figure>
                        <div class="blog-content">
                            <h3 class="title"><a href="{{ route('show.blog', $blog->id) }}">{{ $blog->title }}</a></h3>
                            <div class="desc">
                                {!! Str::limit( strip_tags(markdownToHtml($blog->description)) ) !!}
                            </div>
                            <a href="{{ route('show.blog', $blog->id) }}" class="button-primary-trans mouse-dir">
                                {{ __('Leer Mas')  }}
                                <span class="dir-part"></span><i class="fal fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach


            @if ($blogs->isEmpty())
                <h5 class="text-center">{{ __('No hay resultados') }}</h5>
            @endif

            @if ($tieneBúsqueda)
                <div class="col-sm-12 text-center">
                    <a href="{{ route('show.blogs', ['category' => '', 'search' => '']) }}">
                        {{ __('Reset Búsqueda') }}
                    </a>
                </div>
            @endif

        </div>

        <!-- Pagination -->
        <div class="row">
            <div class="col-sm-12 text-center">
                {{-- {{ $blogs->links() }} --}}
                <nav class="navigation pagination">
                    <div class="nav-links d-flex justify-content-center">
                        {{ $blogs->links() }}
                    </div>
                </nav>
            </div>
        </div>

    </div>
</section>
<!-- Portfolio-Area-End -->

<!-- Quote-Area-Start -->
{{-- <section class="quote-area section-padding-bottom">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="quote-box">

                    <div class="row ">
                        <div class="col-lg-6 offset-lg-3">
                            <div class="quote-content">
                                <h3 class="title">Start Journey Today</h3>
                                <div class="desc">
                                    <p>Earum quos animi numquam excepturi eveniet explicabo repellendus rem
                                        esse.
                                        Quae quasi
                                        odio enim.</p>
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
</section> --}}
<!-- Quote-Area-End -->

@endsection