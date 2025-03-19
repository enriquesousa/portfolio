<!doctype html>
<html class="no-js" lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Portafolio | TJWeb</title>
	<link rel="shortcut icon" type="image/ico" href="{{ asset('frontend/assets/images/favicon.png') }}" />

	<link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/normalize.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/style-plugin-collection.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/theme.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css') }}">

	<!-- Bootstrap Icons fonts para poder usar los bootstrap iconos -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

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

	<!-- Iconify: https://icon-sets.iconify.design/?query=language&keyword=l -->
    <script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>

	{{-- Para el código JS dinámico de las vistas, se puedan ejecutar cuando los llamamos con @push('child-scripts')  --}}
    @stack('child-scripts')
	
</body>

</html>