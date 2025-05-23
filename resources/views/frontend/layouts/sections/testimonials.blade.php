<!-- Testimonial-Area-Start -->
<section class="testimonial-area" id="testimonials-page">
    <div class="container">
        <div class="row">

            <div class="col-lg-6 offset-lg-3 text-center">
                <div class="section-title">
                    <h3 class="title">{{ __($feedbackTitleTestimonial->title) }}</h3>
                    <div class="desc">
                        <p>{{ __($feedbackTitleTestimonial->sub_title) }}</p>
                    </div>
                </div>
            </div>

        </div>
        <div class="row margentop">
            <div class="col-sm-12">

                <div class="testimonial-slider">

                    @foreach ($feedbackTestimonials as $feedbackTestimonial)
                        <div class="single-testimonial">
                            <div class="testimonial-header">
                                <div class="quote">
                                    <i class="fas fa-quote-left"></i>
                                </div>
                                <h5 class="title">{{ $feedbackTestimonial->name }}</h5>
                                <h6 class="position">{{ $feedbackTestimonial->position }}</h6>
                            </div>
                            <div class="content">
                                {!! $feedbackTestimonial->description !!}
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
        </div>
    </div>
</section>
<!-- Testimonial-Area-End -->