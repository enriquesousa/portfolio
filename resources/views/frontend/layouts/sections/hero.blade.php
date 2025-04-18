
@php
    // if hero image is not set, use default image
    if($hero->image == null){
        $hero->image = 'frontend/assets/imagenes/hero-800x400.png';
    }
@endphp


<!-- Header-Area-Start -->
<header class="header-area parallax-bg" id="home-page" style="background-image: url({{ asset($hero->image) }}); no-repeat scroll top center/cover;" >
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="header-text">

                    <h3 class="typer-title wow fadeInUp winky-sans-subtitulo" data-wow-delay="0.2s" style="font-size: 20px; font-weight: 300">I'm ui/ux designer</h3>

                    <h1 class="title wow fadeInUp coiny-regular" data-wow-delay="0.3s">{{ __($hero->title) }}</h1>

                    <div class="desc wow fadeInUp winky-sans-subtitulo" data-wow-delay="0.4s">
                        <p>{{ __($hero->sub_title) }}</p>
                    </div>

                    @if( $hero->btn_text)
                        <a href="{{ $hero->btn_url }}" class="button-dark mouse-dir wow fadeInUp" data-wow-delay="0.5s">
                            {{ __($hero->btn_text) }} <span class="dir-part"></span>
                        </a>
                    @endif

                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header-Area-End -->


@push('child-scripts')
    <script>
        @php
            $titles = [];
            foreach($typerTitles as $typerTitle){
                $titles[] = __($typerTitle->title);
            }
            // Convertir el php array a JSON array
            $titles = json_encode($titles);
        @endphp
        // usamos {!! $titles !!} para que lo tome como un string con todo y caracteres especiales, y no como un objeto
        $('.header-area .typer-title').typer({!! $titles !!});
    </script>
@endpush