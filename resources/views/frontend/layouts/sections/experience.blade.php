<!-- Experience-Area-Start -->
<section class="experience-area section-padding" id="experience-page">
    <div class="container">
        <div class="row d-flex align-items-center">

            {{-- Contenido Izquierdo Imagen --}}
            <div class="col-lg-6 d-none d-lg-block">
                <figure class="single-image wow fadeInLeft">
                    <img src="{{ asset($experience->image) }}" alt="">
                </figure>
            </div>

            {{-- Contenido Derecho --}}
            <div class="col-lg-6">
                <div class="experience-text">
                    <h3 class="title wow fadeInUp" data-wow-delay="0.3s">{{ $experience->title }}</h3>
                    <div class="desc wow fadeInUp" data-wow-delay="0.4s">
                        <p>{!! $experience->description !!}</p>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="icon-info wow fadeInUp" data-wow-delay="0.3s">
                                <div class="icon">
                                    <i class="fas fa-mobile-android-alt" style="font-size: 14px"></i>
                                </div>
                                <h6><a href="javascript:void(0)" class="text" style="font-size: 14px">{{ $experience->phone }}</a></h6>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="icon-info wow fadeInUp" data-wow-delay="0.4s">
                                <div class="icon">
                                    <i class="fas fa-envelope" style="font-size: 14px"></i>
                                </div>
                                <h6>
                                    <a href="mailto:{{ $experience->email }}" target="_blank" class="text" style="font-size: 14px">{{ $experience->email }}</a>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- Experience-Area-End -->