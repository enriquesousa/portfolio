<!-- About-Area-Start -->
<section class="about-area section-padding-top" id="about-page">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-lg-6">
                <figure class="about-image">
                    <img src="{{ asset($about->image) }}" alt="" class="wow fadeInUp" data-wow-delay="0.3s">
                </figure>
            </div>
            <div class="col-lg-6">
                <div class="about-text">

                    <h3 class="title wow fadeInUp" data-wow-delay="0.3s">{{ __($about->title) }}</h3>

                    <div class="desc wow fadeInUp" data-wow-delay="0.4s">

                        {{-- If locale is english, show the description, if not, show the description in Spanish --}}
                        @if (app()->getLocale() == 'en')
                            <p>{!! $about->description_en !!}</p>
                        @else
                            <p>{!! $about->description !!}</p>
                        @endif
                        
                    </div>

                    @if( $about->resume)
                        <a href="{{ route('resume.download') }}" class="button-primary-trans mouse-dir wow fadeInUp" data-wow-delay="0.5s">
                            <span class="icon"><i class="fal fa-download"></i></span>
                            <span class="text">Descargar CV</span>
                            <span class="dir-part"></span>
                        </a>
                    @endif

                </div>
            </div>
        </div>
    </div>
</section>
<!-- About-Area-End -->