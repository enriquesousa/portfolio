@php
    $footerInfo = \App\Models\FooterInfo::first();
    $footerIcons = \App\Models\FooterSocialLink::all();
    $footerUsefulLinks = \App\Models\FooterUsefulLink::all();
    $footerContact = \App\Models\FooterContactInfo::first();
    $footerHelpLinks = \App\Models\FooterHelpLink::all();
@endphp

<!-- Footer-Area-Start -->
<footer class="footer-area" id="footer-area">
    <div class="container">
        <div class="row footer-widgets">

            <!-- Logo, description and social links  -->
            <div class="col-md-12 col-lg-3 widget">
                <div class="text-box">
                    <figure class="footer-logo">
                        {{-- <img src="{{ asset('images/logo-v_400x400_white.png') }}" alt="TJWeb" style="width: 100px;" class="img-center"> --}}
                        <img src="{{ asset($generalSetting->footer_logo) }}" alt="TJWeb" style="width: 100px;" class="img-center">
                    </figure>
                    <p>{!! __($footerInfo->info) !!}</p>
                    <ul class="d-flex flex-wrap">
                        @foreach ($footerIcons as $item)
                            <li><a href="{{ $item->url }}"><i class="{{ $item->icon }}"></i></a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Useful Links -->
            <div class="col-md-4 col-lg-2 offset-lg-1 widget">
                <h3 class="widget-title">{{ __('Links Útiles') }}</h3>
                <ul class="nav-menu">
                    @foreach ($footerUsefulLinks as $item)
                        <li><a href="{{ $item->url }}">{{ __($item->name) }}</a></li>
                    @endforeach
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="col-md-4 col-lg-3 widget">
                <h3 class="widget-title">{{ __('Información de Contacto') }}</h3>
                <ul>
                    <li>{{ $footerContact->address }}</li>
                    <li><a href="javascript:void(0)">{{ $footerContact->phone }}</a></li>
                    <li><a href="javascript:void(0)">{{ $footerContact->email }}</a></li>
                </ul>
            </div>

            <!-- Help -->
            <div class="col-md-4 col-lg-3 widget">
                <h3 class="widget-title">{{ __('Links de Ayuda') }}</h3>
                <ul class="nav-menu">
                    @foreach ($footerHelpLinks as $item) 
                        <li><a href="{{ $item->url }}" target="_blank" title="{{ __('Abrir en nuevo tab') }}">{{ __($item->name) }}</a></li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="copyright">
                        <p>{!! __($footerInfo->copy_right) !!}</p>
                        <p>{!! __($footerInfo->made_by) !!}</p>
                        <p>{{ formatFecha5(date('Y-m-d H:i:s')) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</footer>
<!-- Footer-Area-End -->