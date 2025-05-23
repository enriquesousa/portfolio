<!-- Blog-Area-Start -->
<section class="blog-area section-padding-top" id="blog-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 text-center">
                <div class="section-title">
                    <h3 class="title">{{ __($blogsTitle->title) }}</h3>
                    <div class="desc">
                        <p>{!! __($blogsTitle->sub_title) !!}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row margentop">
            <div class="col-sm-12">
                <div class="blog-slider">
                    @foreach ($blogs as $blog)
                        <div class="single-blog">
                            <figure class="blog-image">
                                <img src="{{ asset($blog->image) }}" alt="">
                            </figure>
                            <div class="blog-content">
                                <h3 class="title">
                                    <a href="{{ route('show.blog', $blog->id) }}">{{ Str::limit( strip_tags(__($blog->title)), 20, '..'  ) }}</a>
                                </h3>
                                <div class="desc">
                                    {{-- por default str limit es 100 --}}
                                    {!! Str::limit( strip_tags(markdownToHtml($blog->description)) ) !!}
                                    {{-- <p>{!! Str::limit( strip_tags(__($blog->description)), 50, '..'  ) !!} </p> --}}
                                </div>
                                <p>{{ __('Categoría') }}:&nbsp<span>{{ $blog->getCategory->name }}</span></p>
                                <a href="{{ route('show.blog', $blog->id) }}" class="button-primary-trans mouse-dir">
                                    {{ __('Leer Mas')  }}
                                    <span class="dir-part"></span> 
                                    <i class="fal fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog-Area-End -->