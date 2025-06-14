<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login &mdash; TJWeb</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    {{-- <link rel="stylesheet" href="../node_modules/bootstrap-social/bootstrap-social.css"> --}}

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">

                        {{-- Logo --}}
                        <div class="login-brand">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('images/logo-v.png') }}" alt="logo" width="" class="">
                            </a>
                        </div>

                        <div class="card card-primary">

                            <div class="card-header">
                                <h4>{{ __('Iniciar sesión') }}</h4>
                            </div>

                            <div class="card-body">

                                {{-- Aviso de status (por si restablecieron contraseña) --}}
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                {{-- Formulario --}}
                                <form method="POST" action="{{ route('login',getSessionLocale()) }}" class="needs-validation" novalidate="">
                                    @csrf

                                    {{-- Correo Electrónico --}}
                                    <div class="form-group">
                                        <label for="email">{{ __('Correo Electrónico') }}</label>
                                        <input id="email" type="email" class="form-control" name="email"
                                            tabindex="1" value="{{ old('email') }}" required autofocus>
                                        @if( $errors->has('email'))
                                            <code>{{ $errors->first('email') }}</code>
                                        @endif
                                    </div>

                                    {{-- Olvidaste tu Contraseña y Contraseña --}}
                                    <div class="form-group">

                                        <div class="d-block">
                                            <label for="password" class="control-label">{{ __('Contraseña') }}</label>
                                                <div class="float-right">
                                                <a href="{{ route('password.request',getSessionLocale()) }}" class="text-small">
                                                    {{ __('¿Olvidaste tu contraseña?') }}
                                                </a>
                                            </div>
                                        </div>

                                        <input id="password" type="password" class="form-control" name="password"
                                            tabindex="2" required>
                                        <input type='checkbox' id='check' />
                                        <label for='check'>Mostrar contraseña</label>
                                        @if( $errors->has('password'))
                                            <code>{{ $errors->first('password') }}</code>
                                        @endif

                                    </div>

                                    {{-- Recuérdame --}}
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="remember" class="custom-control-input"
                                                tabindex="3" id="remember-me">
                                            <label class="custom-control-label" for="remember-me">{{ __('Recuérdame') }}</label>
                                        </div>
                                    </div>

                                    {{-- Botón Submit Iniciar sesión --}}
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            {{ __('Iniciar sesión') }}
                                        </button>
                                    </div>

                                </form>

                                {{-- Redes sociales --}}
                                {{-- <div class="text-center mt-4 mb-3">
                                    <div class="text-job text-muted">Iniciar sesión con redes sociales</div>
                                </div>
                                <div class="row sm-gutters">
                                    <div class="col-6">
                                        <a class="btn btn-block btn-social btn-facebook">
                                            <span class="fab fa-facebook"></span> Facebook
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <a class="btn btn-block btn-social btn-twitter">
                                            <span class="fab fa-twitter"></span> Twitter
                                        </a>
                                    </div>
                                </div> --}}

                            </div>

                        </div>

                        {{-- No tienes una cuenta --}}
                        {{-- <div class="mt-5 text-muted text-center">
                            No tienes una cuenta? <a href="auth-register.html">Crear una</a>
                        </div> --}}

                        {{-- Footer Copyright --}}
                        <div class="simple-footer">
                            {{ __('Copyright') }} &copy; TJWeb 2025
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="{{ asset('assets/js/stisla.js') }}"></script>

    <!-- JS Libraies -->

    <!-- Template JS File -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    <!-- Page Specific JS File -->
</body>

</html>

<script>
    // Mostrar/ocultar contraseña
    const check = document.getElementById('check');
    const password = document.getElementById('password');

    check.addEventListener('change', function() {
        if (this.checked) {
            password.setAttribute('type', 'text');
        } else {
            password.setAttribute('type', 'password');
        }
    });
</script>