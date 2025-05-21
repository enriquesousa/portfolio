<!-- Service-Area-Start -->
<section class="service-area section-padding-top" id="services-page">
    <div class="container">

        <div class="row">            
            @foreach ($services as $service)
                {{-- Usar mt-3 si los cards pasa de: 2 --}}
                <div class="col-lg-6 {{ $loop->index > 1 ? 'mt-4' : '' }}">
                    <div class="single-service">
                        <h3 class="title wow fadeInRight" data-wow-delay="0.3s">{{ __($service->name) }}</h3>
                        <div class="desc wow fadeInRight" data-wow-delay="0.4s">
                            <p>{{ __($service->description) }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>
<!-- Service-Area-End -->