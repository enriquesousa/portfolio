<!-- Portfolio-Area-Start -->
<section class="portfolio-area section-padding-top" id="portfolio-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 text-center">
                <div class="section-title">
                    <h3 class="title">{{ __($portfolioTitle->title) }}</h3>
                    <div class="desc">
                        <p>{!! __($portfolioTitle->sub_title) !!}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Títulos Categorías --}}
        <div class="row">
            <div class="col-sm-12">
                <ul class="filter-menu">
                    <li class="active" data-filter="*">{{ __('Todos') }}</li>
                    @foreach ($portfolioCategories as $portfolioCategory)
                        <li data-filter=".{{ $portfolioCategory->slug }}">{{ __($portfolioCategory->name) }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        {{-- Artículos Portafolio --}}
        <div class="portfolio-wrapper">
            <div class="row portfolios">
                @foreach ($portfolioItems as $item)
                    <div data-wow-delay="0.3s" class="col-md-6 col-lg-4 filter-item {{ $item->category->slug }}">
                        <div class="single-portfolio">
                            <figure class="portfolio-image">
                                <img src="{{ asset($item->image) }}" alt="">
                            </figure>
                            <div class="portfolio-content">
                                <a href="{{ asset($item->image) }}" data-lity class="icon" title="{{ __('Ver imagen completa') }}">
                                    <i class="fas fa-plus"></i>
                                </a>
                                <h4 class="title">
                                    <a href="{{ route('show.portfolio', $item->id) }}">{{ __($item->title) }}</a>
                                </h4>
                                <div class="desc">
                                    @if (app()->getLocale() == 'en')
                                        <p>{!! Str::limit( strip_tags(__($item->description_en)), 60, '...'  ) !!}</p>
                                    @else
                                        <p>{!! Str::limit( strip_tags(__($item->description)), 60, '...'  ) !!}</p>  
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</section>
<!-- Portfolio-Area-End -->