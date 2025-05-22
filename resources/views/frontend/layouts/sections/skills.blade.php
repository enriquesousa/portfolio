<!-- Skills-Area-Start -->
<section class="skills-area section-padding-top" id="skills-page">
    <div class="container">
        <div class="row">

            {{-- Titulo y Sub-Titulo y Slider Gráfico --}}
            <div class="col-lg-6">

                {{-- Titulo y Sub-Titulo --}}
                <div class="row">
                    <div class="col-sm-12">
                        <div class="section-title">
                            <h3 class="title">{{ __($skill->title) }}</h3>
                            <div class="desc">
                                <p>{{ __($skill->sub_title) }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Slider Gráfico --}}
                <div class="row skills">

                    @foreach ($skillItems as $skillItem)
                        <div class="col-sm-6">
                            <div class="bar_group wow fadeInUp" data-wow-delay="0.3s" data-max="100">
                                <div class="title">{{ __($skillItem->name) }}</div>
                                <div class="bar_group__bar thick elastic" data-value="{{ $skillItem->percent }}" data-color="{{ getColor($loop->index) }}" data-tooltip="true" data-show-values="false" data-unit="%">
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>

            {{-- Imagen que esta a la derecha --}}
            <div class="col-lg-6 d-none d-lg-block">
                <figure class="single-image text-right wow fadeInRight">
                    <img src="{{ asset($skill->image) }}" alt="skill-image">
                </figure>
            </div>

        </div>
    </div>
</section>
<!-- Skills-Area-End -->