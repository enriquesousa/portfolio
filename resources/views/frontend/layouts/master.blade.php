@php
    $generalSetting = \App\Models\GeneralSetting::first();
@endphp
<!doctype html>
<html class="no-js" lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>Portafolio | TJWeb</title>

	{{-- <link rel="shortcut icon" type="image/ico" href="{{ asset('frontend/assets/images/favicon.png') }}" /> --}}
	{{-- <link rel="icon" type="image/png" href="{{ asset('images/icon48x48.png') }}"> --}}
	<link rel="icon" type="image/png" href="{{ asset($generalSetting->favicon) }}">

	<link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/normalize.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/style-plugin-collection.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/theme.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css') }}">

	{{-- Plugin Toastr CSS para JavaScript Para mostrar mensajes de error en los formularios de las vistas --}}
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

	<!-- Bootstrap Icons fonts para poder usar los bootstrap iconos -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

	<!-- Google fonts coiny font para titulo TJWeb y winky sans para subtitulo -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Coiny&family=Winky+Sans:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">

	<!-- Google fonts CSS -->
	<style type="text/css">

		.coiny-regular {
			font-family: "Coiny", system-ui;
			font-weight: 400;
			font-style: normal;
		}

		.winky-sans-subtitulo {
			font-family: "Winky Sans", sans-serif;
			font-optical-sizing: auto;
			font-weight: 400;
			font-style: normal;
		}

	</style>

	<!-- Custom CSS -->
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/custom.css') }}">

	@stack('child-styles')

</head>

<body>  
	<div class="preloader">
		<img src="{{ asset('frontend/assets/images/preloader.gif') }}" alt="">
	</div>

	@include('frontend.layouts.navbar')

	<div class="main_wrapper" data-bs-spy="scroll" data-bs-target="#main_menu_area" data-bs-root-margin="0px 0px -40%"
		data-bs-smooth-scroll="true" class="scrollspy-example bg-body-tertiary" tabindex="0">

		@yield('content')

		@include('frontend.layouts.footer')

	</div>


	<script src="{{ asset('frontend/assets/js/vendor/jquery-min.js') }}"></script>
	<script src="{{ asset('frontend/assets/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('frontend/assets/js/contact-form.js') }}"></script>
	<script src="{{ asset('frontend/assets/js/jquery-plugin-collection.js') }}"></script>
	<script src="{{ asset('frontend/assets/js/vendor/modernizr.js') }}"></script>
	<script src="{{ asset('frontend/assets/js/main.js') }}"></script>

	<!-- Para mostrar mensajes de error en los formularios de las vistas -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	

	<!-- Iconify: https://icon-sets.iconify.design/?query=language&keyword=l -->
    <script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>

	{{-- Para el código JS dinámico de las vistas, se puedan ejecutar cuando los llamamos con @push('child-scripts')  --}}
    @stack('child-scripts')
	
</body>

</html>